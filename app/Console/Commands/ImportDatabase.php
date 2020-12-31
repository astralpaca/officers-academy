<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

use App\Imports\CampaignsImport;
use App\Imports\HeroesImport;
use App\Imports\CampaignsHeroesImport;

class ImportDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Imports the csv datafiles into the database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Artisan::call('migrate:fresh'); //drop all tables and recreate them
        Excel::import(new CampaignsImport, storage_path('db/campaigns.csv'));
        Excel::import(new HeroesImport, storage_path('db/heroes.csv'));
        Excel::import(new CampaignsHeroesImport, storage_path('db/campaignsheroes.csv'));
    }
}
