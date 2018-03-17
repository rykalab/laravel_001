<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Bartek extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bartek:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Komenda testowa';

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
     * @return mixed
     */
    public function handle()
    {
        $this->info('Jestem super');
    }
}
