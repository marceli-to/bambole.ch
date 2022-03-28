<?php
namespace App\Events;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Backer;

class BackerRegistration
{
  use Dispatchable, SerializesModels;
  
  /**
   * Create a new event instance.
   * 
   * @param Backer $backer
   * @return void
   */
  public function __construct(Backer $backer)
  {
    $this->backer = Backer::with('duty')->findOrFail($backer->id);
  }
}
