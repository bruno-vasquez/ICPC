<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Reportes;
use App\Http\Controllers\EventosInteresadosController;
use App\Http\Controllers\CompetenciaParticipantesController;
use App\Http\Controllers\CompetenciaEquiposController;
use App\Models\Competencias;
use App\Models\Equipos;
use App\Models\Eventos;

class CorreoController extends Controller
{
    public function enviarCorreoEventos($evento_id)
    {
        $eventos = Eventos::find($evento_id);
        $eventosInteresadosController = new EventosInteresadosController();
        $emailsInteresados = $eventosInteresadosController->getEmailsInteresados($evento_id);
        // Personaliza el contenido del mensaje según tus necesidades
        $contenidoMensaje = $eventos->reporte;
        $nombre = $eventos->nombre;
        info($nombre);

        // Envía el correo a múltiples destinatarios
        Mail::to($emailsInteresados)
        ->send(new Reportes($contenidoMensaje, $nombre, ['subject' => 'Nombre del Evento: ' . $nombre]));
        return "Correo enviado a múltiples destinatarios";
    }
    
    public function enviarCorreoCompetenciasIndi($competencia_id)
    {
        $competencia = Competencias::find($competencia_id);
        $competenciaParticipantes = new CompetenciaParticipantesController();
        $emailsParticipantes = $competenciaParticipantes->getEmailsParticipantes($competencia_id);
        // Personaliza el contenido del mensaje según tus necesidades
        $contenidoMensaje = $competencia->reporte;
        $nombre = $competencia->nombre;

        // Envía el correo a múltiples destinatarios
        Mail::to($emailsParticipantes)
        ->send(new Reportes($contenidoMensaje, $nombre, ['subject' => 'Nombre de la Competencia: ' . $nombre]));
        return "Correo enviado a múltiples destinatarios";
    }
    public function enviarCorreoCompetenciasGru($competencia_id)
    {
        $competencia = Competencias::find($competencia_id);
        $competenciaEquipos= new CompetenciaEquiposController();
        $emailsEquipos = $competenciaEquipos->getEmailsEquipos($competencia_id);
        // Personaliza el contenido del mensaje según tus necesidades
        $contenidoMensaje = $competencia->reporte;
        $nombre = $competencia->nombre;
        
        // Envía el correo a múltiples destinatarios
        Mail::to($emailsEquipos)
        ->send(new Reportes($contenidoMensaje, $nombre, ['subject' => 'Nombre de la Competencia: ' . $nombre]));
        return "Correo enviado a múltiples destinatarios";
    }
}