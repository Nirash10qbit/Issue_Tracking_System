<?php

namespace Modules\Tracking\Http\Controllers;

use App\Http\Resources\DataResource;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Routing\Controller;
use Modules\Tracking\Http\Requests\CreateUserRequest;
use Modules\Tracking\Http\Requests\UpdateUserRequest;
use Spatie\QueryBuilder\QueryBuilder;

class UserController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth:sanctum');
//    }

    /**
     * Display a listing of the resource.
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $users = QueryBuilder::for(User::class)
            ->paginate(10);
        return DataResource::collection($users);
    }


    /**
     * Store a newly created resource in storage.
     * @param CreateUserRequest $createUserRequest
     * @return DataResource
     */
    public function store(CreateUserRequest $createUserRequest): DataResource
    {
        $user = User::create($createUserRequest ->validated());
        return new DataResource($user);
    }


    /**
     * Show the specified resource.
     * @param User $user
     * @return DataResource
     */
    public function show(User $user): DataResource
    {
       User::whereId($user->id)->firstOrFail();
       return new DataResource($user);
    }


    /**
     * Update the specified resource in storage.
     * @param UpdateUserRequest $updateuserRequest
     * @return DataResource
     */
    public function update(UpdateUserRequest $updateuserRequest): DataResource
    {
        User::update($updateuserRequest->validated());
        return new DataResource($updateuserRequest);
    }

    /**
     * Remove the specified resource from storage.
     * @param User $user
     * @return DataResource
     */
    public function destroy(User $user): DataResource
    {
        $user->Delete();
        return new DataResource($user);
    }
}
