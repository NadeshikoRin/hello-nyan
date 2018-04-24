<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;

use DB;

class AutoDeleteTrans extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:autodelete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Auto Delete Transaction that expired in 5 years';

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
        DB::table('transactions')->whereYear('trans_tanggal', '<', Carbon::now()->subYear(5))->delete();
    }
}
