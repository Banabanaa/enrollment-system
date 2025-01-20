<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdvisingMail extends Mailable
{
    use Queueable, SerializesModels;

    public $student;
    public $advisingNotes;
    public $advisedCourses;

    /**
     * Create a new message instance.
     *
     * @param $student
     * @param $advisingNotes
     * @param $advisedCourses
     */
    public function __construct($student, $advisingNotes, $advisedCourses)
    {
        $this->student = $student;
        $this->advisingNotes = $advisingNotes;
        $this->advisedCourses = $advisedCourses;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Advised Subjects')
                    ->view('emails.advising')
                    ->with([
                        'student' => $this->student,
                        'advisingNotes' => $this->advisingNotes,
                        'advisedCourses' => $this->advisedCourses,
                    ]);
    }
}
