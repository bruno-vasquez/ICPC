<?php

// app/Mail/CorreoMultiple.php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Eventos;
use App\Models\Competencias;


class Reportes extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = 'CodeFusion informa';
    public $messageContent;
    public $nombre;
    public $reporte;

    public function __construct($messageContent, $nombre)
    {
        $this->messageContent = $messageContent;
        $this->nombre = $nombre;
    }
    public function build()
    {
        return $this->from('codefusionsoft@gmail.com', 'codefusion')
                ->view('emails.multiple_recipients')
                ->subject('Anuncio Importante: ' . $this->nombre);
    }
}