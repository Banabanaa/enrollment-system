<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('assets/cvsulogo.png') }}" type="image/png">

    <link rel="stylesheet" href="{{ asset('login/loginstyles.css')}}">
    <title>Admin Login</title>
    <style>
        .background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: no-repeat center center fixed;
            background-size: cover;
            z-index: -1;
        }
    </style>
</head>
<body>
    <div class="background" style="background: url('{{ asset('assets/bg2.svg') }}') no-repeat center center fixed; background-size: cover;"></div>

    <div class="logo">
        <img src="{{ asset('assets/3.svg') }}" alt="Logo" class="logo-img">
    </div>
    <div class="login-box">
        <h5 class="cvsu">CAVITE STATE UNIVERSITY - BACOOR CAMPUS</h5>
        <div class="login-header">
            <header>Enrollment System <br> - ADMIN LOG IN -</header>
        </div>
        <!-- Login Form -->
        <form method="POST" action="{{ route('admin.login') }}">
            @csrf

            <!-- Email Input -->
            <div class="input-box">
                <input type="email" name="email" class="input-field" placeholder="Email" autocomplete="username" value="{{ old('email') }}" required>
                @error('email')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password Input -->
            <div class="input-box">
                <input type="password" name="password" class="input-field" placeholder="Password" autocomplete="current-password" required>
                @error('password')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <!-- Remember Me and Forgot Password -->
            <div class="remember-forgot">
                <section>
                    <input type="checkbox" id="check" name="remember">
                    <label for="check">Remember me</label>
                </section>
                <section>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" id="forgotPasswordLink">Forgot password</a>
                    @endif
                </section>
            </div>

            <!-- Submit Button -->
            <div class="input-submit">
                <button type="submit" class="submit-btn">Sign In</button>
            </div>
        </form>
            <button class="back-btn" onclick="window.history.back();">Back</button>
    </div>

    <!-- Forgot Password Modal -->
    <div id="forgotPasswordModal" class="modal">
        <div class="modal-content">
            <span id="closeModal" class="close">&times;</span>
            <h3>Reset Password</h3>
            <p>Please enter your email to receive a reset link.</p>
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <input type="email" name="email" placeholder="Enter your email" required>
                <button type="submit" class="btn">Send Reset Link</button>
            </form>
        </div>
    </div>

    <script src="{{ asset('js/loginscript.js') }}"></script>
</body>
</html>
