<?php

// app/Mail/CorreoMultiple.php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Reportes extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = 'CodeFusion informa';
    public $messageContent;

    public function __construct($messageContent)
    {
        $this->messageContent = $messageContent;
    }

    public function build()
    {
        return $this->from('codefusionsoft@gmail.com', 'codefusion')
                ->view('emails.multiple_recipients');
    }
}

