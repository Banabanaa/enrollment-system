<?php 
namespace App\Mail;

use App\Models\Advising;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StudentAdvisingMail extends Mailable
{
    use Queueable, SerializesModels;

    public $advising;

    public function __construct(Advising $advising)
    {
        $this->advising = $advising;
    }

    public function build()
    {
        return $this->subject('Advising Details')
                    ->view('emails.student_advising')
                    ->with([
                        'studentName' => $this->advising->first_name . ' ' . $this->advising->last_name,
                        'courses' => $this->advising->advised_course,
                        'advisingNotes' => $this->advising->advising_notes,
                        'departmentName' => $this->advising->department_first_name . ' ' . $this->advising->department_last_name,
                    ]);
    }
}
