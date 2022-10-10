<?php

namespace App\Domains\Posts\Services;

use App\Domains\Posts\Repositories\PostRepository;

class PostService
{
    protected $post_repository;

    public function __construct(PostRepository $post_repository)
    {
        $this->post_repository = $post_repository;
    }

    public function get_all()
    {
        $posts   = $this->post_repository->getAll();
        $results = [];
        foreach ($posts as $key => $post) {
            $results[] = [
                'title'            => $post->title,
                'description'      => $post->description,
                'publication_date' => $post->publication_date,
                'user'             => $post->User->name
            ];
        }
        return $results;
    }

    public function create($request)
    {
        return $this->post_repository->create($request);
    }
}
