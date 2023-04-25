<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Recuperar extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $token;
    public $nombre;
    public function __construct($nombre, $token)
    {
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_ADDRESS'))
            ->view('email.recuperar')
            ->subject('Recupera tu contraseña')
            ->with($this->nombre, $this->token);
    }
}
