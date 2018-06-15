<?php

namespace App\Http\Controllers;

use App\Transformers\UserTransformers;
use App\User;
use Illuminate\Http\Request;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class UserController extends Controller
{
    public function index()
    {
        $users = User::select('id', 'name', 'email')->paginate(10);
        $usersCollection = $users->getCollection();

        return fractal()
            ->collection($usersCollection)
            ->transformWith(new UserTransformers())
            ->paginateWith(new IlluminatePaginatorAdapter($users))
            ->toArray();
    }
}
