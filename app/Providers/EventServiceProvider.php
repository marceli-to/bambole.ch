<?php

namespace App\Providers;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\BackerRegistration;
use App\Listeners\BackerRegistrationNotification;
use App\Listeners\SubscriberVerifyEmailNotification;

class EventServiceProvider extends ServiceProvider
{
  /**
   * The event listener mappings for the application.
   *
   * @var array
   */
  protected $listen = [

    Registered::class => [
      SendEmailVerificationNotification::class,
    ],

    BackerRegistration::class => [
      BackerRegistrationNotification::class,
    ],
  ];

  /**
   * Register any events for your application.
   *
   * @return void
   */
  public function boot()
  {
    parent::boot();
  }
}
