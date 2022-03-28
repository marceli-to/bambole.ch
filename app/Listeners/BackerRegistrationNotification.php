<?php
namespace App\Listeners;
use App\Events\BackerRegistration;
use App\Mail\BackerRegistrationRequest;
use App\Models\Backer;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class BackerRegistrationNotification
{

  /**
   * Handle the event.
   *
   * @param  BackerRegistration $event
   * @return void
   */
  public function handle(BackerRegistration $event)
  {
    $this->sendRequest($event->backer);
  }

  /**
   * Send request
   * 
   * @param Backer $backer
   * @return void
   */

  public function sendRequest(Backer $backer)
  {
    Mail::to(\Config::get('client.email.recipient'))->send(new BackerRegistrationRequest($backer));
  }
}
