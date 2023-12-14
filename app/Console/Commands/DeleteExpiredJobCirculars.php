<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\JobCircular;

class DeleteExpiredJobCirculars extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-expired-job-circulars';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        JobCircular::where('deadline', '<', now())->delete();

        $this->info('Expired job circulars deleted successfully.');
    }
}
