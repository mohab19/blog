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
        return $this->post_repository->getAll();
    }

    public function create($request)
    {
        return $this->post_repository->create($request);
    }
}
