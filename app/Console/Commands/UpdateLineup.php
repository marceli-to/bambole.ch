<?php

namespace App\Console\Commands;

use App\Models\Band;
use App\Models\Stage;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class UpdateLineup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bambole:update-lineup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset stages to «Grosse Bühne» / «Kleine Bühne» and reseed the band lineup from the 2026 poster';

    /**
     * Lineup from the poster, grouped by day.
     * day 1 = 30.7. (Donnerstag), day 2 = 31.7. (Freitag), day 3 = 1.8. (Samstag)
     */
    protected $lineup = [
        1 => [
            'Gloria Volt',
            'Dave Martens',
            'Fogel',
        ],
        2 => [
            'The Crumpets',
            'Brutal Brutal',
            'Old Kids Noise',
            'God In Therapy',
            'Lavender Park',
            'DJ Ghostpointer & Friends',
        ],
        3 => [
            'Klaus Estermann',
            'Ossoguggo',
            'Teenage Bubblegums',
            'Sour Shots',
            'Defused',
            'Peek A Boo',
            'My Sleeping Karma',
            'Twenty Two Toads',
            'Styrofoam',
            'DJ Mother Dubber',
            'Rain',
            'DJ M/Lou',
        ],
    ];

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        DB::transaction(function () {
            // Remove existing bands so foreign keys don't block stage cleanup
            // and so we start from a clean lineup.
            Band::query()->delete();
            $this->info('Removed existing bands.');

            // Reset stages to exactly the two we want.
            Stage::query()->delete();
            $grosse = Stage::create(['name' => 'Grosse Bühne']);
            $kleine = Stage::create(['name' => 'Kleine Bühne']);
            $this->info('Created stages «Grosse Bühne» and «Kleine Bühne».');

            $stageIds = [$grosse->id, $kleine->id];

            foreach ($this->lineup as $day => $names) {
                foreach ($names as $order => $name) {
                    Band::create([
                        'name'       => $name,
                        'day'        => $day,
                        'order'      => $order,
                        'publish'    => 1,
                        'stage_id'   => $stageIds[array_rand($stageIds)], // random stage
                        'time_start' => '18:00:00',
                        'time_end'   => '19:00:00',
                    ]);
                }
                $this->info(sprintf('Day %d: added %d bands.', $day, count($names)));
            }
        });

        $this->newLine();
        $this->info('Lineup updated successfully.');

        return Command::SUCCESS;
    }
}
