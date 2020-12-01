<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use App\User;
use Illuminate\Queue\SerializesModels;

class Registro extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $Usuario;
    public function __construct()
    {
    //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('19170067@uttcampus.edu.mx')
        ->view('emails.Registrar');
    }
}
