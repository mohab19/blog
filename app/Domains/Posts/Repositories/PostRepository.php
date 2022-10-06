<?php

namespace App\Domains\Posts\Repositories;

use App\Repositories\Eloquent\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Domains\Posts\Models\Post;
use App\Domains\Users\Models\User;
use Illuminate\Support\Str;


class PostRepository extends BaseRepository
{
    /**
     * UserRepository constructor.
     *
     * @param Post $model
     */
    public function __construct(Post $model)
    {
        parent::__construct($model);
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function create($request) : Model
    {
        $admin = User::find(1);
        return $this->model->create([
            'user_id'          => $request['user_id'] ?? $admin->id,
            'title'            => $request['title'],
            'description'      => $request['description'],
            'publication_date' => now()
        ]);
    }

}
