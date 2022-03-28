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
    'from' => env('BAMBOLE_MAIL_FROM', 'm@marceli.to'),
    'recipient' => env('BAMBOLE_MAIL_RECIPIENT', 'm@marceli.to'),
    'bcc' => env('BAMBOLE_MAIL_BCC', 'm@marceli.to'),
  ],

  /*
  |--------------------------------------------------------------------------
  | Domain
  |--------------------------------------------------------------------------
  |
  */

  'domain' => env('BAMBOLE_DOMAIN', 'https://bambole.ch'),

  /*
  |--------------------------------------------------------------------------
  | Chunk size for cron jobs
  |--------------------------------------------------------------------------
  |
  */

  'cron_chunk_size' => 3,
]
?>