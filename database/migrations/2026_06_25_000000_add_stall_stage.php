<?php

use App\Models\Stage;
use Illuminate\Database\Migrations\Migration;

class AddStallStage extends Migration
{
    /**
     * Run the migrations.
     *
     * Adds the «Stall» stage (for the DJs) as a third option, without
     * touching the existing stages or bands.
     *
     * @return void
     */
    public function up()
    {
        Stage::firstOrCreate(['name' => 'Stall']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Stage::where('name', 'Stall')->delete();
    }
}
