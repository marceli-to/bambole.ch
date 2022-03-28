<?php
namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Backer;

class BackerRegistrationRequest extends Mailable
{
  use Queueable, SerializesModels;

  /**
   * Create a new message instance.
   *
   * @return void
   */
  public function __construct(Backer $backer)
  {
    $this->backer = $backer;
  }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build()
  {
    $mail = $this->from(['address' => \Config::get('client.email.from')])
                 ->subject('Anmeldung Helfer')
                 ->with(['backer' => $this->backer])
                 ->markdown('mails.registration.request');
    return $mail;
  }
}
