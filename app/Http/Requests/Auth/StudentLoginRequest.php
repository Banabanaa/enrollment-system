<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class StudentLoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Allow all users to attempt login
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'email_or_student_number' => ['required', 'string'], // Accept both email or student number
            'password' => ['required', 'string'], // Password field is required
        ];
    }

    /**
     * Attempt to authenticate the user using the provided credentials.
     */
    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited(); // Check for rate limits (brute force prevention)

        $credentials = $this->only('password'); // Get only the password field

        // Determine if the input is an email or student number
        $input = $this->input('email_or_student_number');
        if (filter_var($input, FILTER_VALIDATE_EMAIL)) {
            // If it's a valid email, use the email for authentication
            $credentials['email'] = $input;
        } else {
            // Otherwise, assume it's a student number
            $credentials['student_number'] = $input;
        }

        // Attempt to authenticate the student with the credentials
        if (!Auth::guard('student')->attempt($credentials, $this->boolean('remember'))) {
            // If authentication fails, increment rate limiter and throw validation exception
            RateLimiter::hit($this->throttleKey());
            throw ValidationException::withMessages([
                'email_or_student_number' => trans('auth.failed'),
            ]);
        }

        // Clear rate limiter if authentication is successful
        RateLimiter::clear($this->throttleKey());
    }

    /**
     * Ensure the request is not rate-limited.
     */
    public function ensureIsNotRateLimited(): void
    {
        if (RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            // If too many attempts are made, lock the user out for a period of time
            event(new Lockout($this));
            $seconds = RateLimiter::availableIn($this->throttleKey());
            throw ValidationException::withMessages([
                'email_or_student_number' => trans('auth.throttle', [
                    'seconds' => $seconds,
                    'minutes' => ceil($seconds / 60),
                ]),
            ]);
        }
    }

    /**
     * Get the throttle key for rate limiting.
     */
    public function throttleKey(): string
    {
        // The throttle key combines the email or student number with the user's IP address
        return Str::lower($this->string('email_or_student_number')).'|'.$this->ip();
    }
}
