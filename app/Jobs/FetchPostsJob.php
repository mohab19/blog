<?php

namespace App\Jobs;

use App\Domains\Posts\Repositories\PostRepository;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use App\Domains\Posts\Models\Post;
use Illuminate\Bus\Queueable;

class FetchPostsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * The number of seconds to wait before retrying the job.
     * @var int
     */
    public $backoff = 10;

    /**
     * The number of seconds the job can run before timing out.
     * @var int
     */
    public $timeout = 60;

    /**
     * The maximum number of unhandled exceptions to allow before failing.
     * @var int
     */
    public $maxExceptions = 3;

    private $uri;
    private $post_repository;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($uri)
    {
        $this->uri             = $uri;
        $this->post_repository = new PostRepository(new Post());
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $response = Http::get($this->uri);
        if($response->ok()) {
            foreach($response->json("articles") as $key => $article) {
                $this->post_repository->create($article);
            }
        }
    }
}
