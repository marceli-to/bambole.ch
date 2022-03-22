<?php

return [

  /*
  |--------------------------------------------------------------------------
  | Company name
  |--------------------------------------------------------------------------
  |
  */

  'company' => env('BAMBOLE_COMPANY_NAME', 'Bambole'),

  /*
  |--------------------------------------------------------------------------
  | E-Mail settings
  |--------------------------------------------------------------------------
  |
  */

  'email' => [
    'from' => env('BAMBOLE_MAIL_FROM', 'marcel@jamon.digital'),
    'recipient' => env('BAMBOLE_MAIL_RECIPIENT', 'm@marceli.to'),
    'bcc' => env('BAMBOLE_MAIL_BCC', 'info@forum-architektur.ch'),
    'recipient_test' => env('BAMBOLE_MAIL_RECIPIENT_TEST', 'm@marceli.to')
  ],

  /*
  |--------------------------------------------------------------------------
  | Domain
  |--------------------------------------------------------------------------
  |
  */

  'domain' => env('BAMBOLE_DOMAIN', 'https://forum-architektur.ch'),

  /*
  |--------------------------------------------------------------------------
  | Chunk size for cron jobs
  |--------------------------------------------------------------------------
  |
  */

  'cron_chunk_size' => 3,
]
?>