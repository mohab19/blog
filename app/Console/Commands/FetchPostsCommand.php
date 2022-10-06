<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\FetchPostsJob;

class FetchPostsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'posts:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Retrieve posts from third party';

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
        $uri = env('THIRD_PARTY_URI');
        $job = FetchPostsJob::dispatch($uri);
    }
}
