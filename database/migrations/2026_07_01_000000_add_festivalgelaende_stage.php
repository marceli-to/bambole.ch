<?php

use App\Models\Stage;
use Illuminate\Database\Migrations\Migration;

class AddFestivalgelaendeStage extends Migration
{
    /**
     * Run the migrations.
     *
     * Adds the «Festivalgelände» stage as an additional option for the
     * bands, without touching the existing stages or bands.
     *
     * @return void
     */
    public function up()
    {
        Stage::firstOrCreate(['name' => 'Festivalgelände']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Stage::where('name', 'Festivalgelände')->delete();
    }
}
