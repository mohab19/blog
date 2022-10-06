<?php

namespace App\Domains\Users\Repositories;

use App\Repositories\Eloquent\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use App\Domains\Users\Models\User;
use Illuminate\Support\Str;


class UserRepository extends BaseRepository
{
    /**
     * UserRepository constructor.
     *
     * @param User $model
     */
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function create($request) : Model
    {
        return $this->model->create([
            'name'     => $request['name'],
            'email'    => $request['email'],
            'password' => Hash::make($request['password'])
        ]);
    }

    public function findWithEmail($email)
    {
        return $this->model->where('email', $email)->first();
    }

}
