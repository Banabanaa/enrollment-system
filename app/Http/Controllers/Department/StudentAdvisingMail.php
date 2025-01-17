<?php
namespace App\Mail;

use App\Models\Student;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StudentAdvisingMail extends Mailable
{
    use Queueable, SerializesModels;

    public $student;
    public $courses;
    public $advisingNotes;

    public function __construct(Student $student, $courses, $advisingNotes)
    {
        $this->student = $student;
        $this->courses = $courses;
        $this->advisingNotes = $advisingNotes;
    }

    public function build()
    {
        return $this->subject('Advising Information')
                    ->view('emails.student_advising')
                    ->with([
                        'student' => $this->student,
                        'courses' => $this->courses,
                        'advisingNotes' => $this->advisingNotes,
                    ]);
    }
}
