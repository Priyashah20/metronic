<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\usertest;

class DemoCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        //return 0;
        $user = usertest::findOrFail(1);
        $data = usertest::create(
            ['name'  => 'priya'],
            ['email' => 'priya@gmail.com']
        );

    }
}
