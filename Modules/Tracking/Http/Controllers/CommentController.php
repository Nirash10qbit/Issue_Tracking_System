<?php

namespace Modules\Tracking\Http\Controllers;

use App\Http\Resources\DataResource;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Routing\Controller;
use Modules\Core\Entities\Comment;
use Modules\Tracking\Http\Requests\CreateCommentRequest;
use Modules\Tracking\Http\Requests\UpdateCategoryRequest;
use Modules\Tracking\Http\Requests\UpdateCommentRequest;
use Spatie\QueryBuilder\QueryBuilder;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $comments = QueryBuilder::for(Comment::class)
            ->paginate(10);
        return DataResource::collection($comments);
    }


    /**
     * Store a newly created resource in storage.
     * @param CreateCommentRequest $createCommentRequest
     * @return DataResource
     */
    public function store(CreateCommentRequest $createCommentRequest): DataResource
    {
        $comment = Comment::create($createCommentRequest->validated());
        return new DataResource($comment);
    }

    /**
     * Show the specified resource.
     * @param Comment $comment
     * @return DataResource
     */
    public function show(Comment $comment): DataResource
    {
        Comment::whereId($comment->id)->firstOrFail();
        return new DataResource($comment);
    }


    /**
     * Update the specified resource in storage.
     * @param UpdateCommentRequest $updateCommentRequest
     * @param Comment $comment
     * @return DataResource
     */
    public function update(UpdateCommentRequest $updateCommentRequest,Comment $comment): DataResource
    {
        $comment->update($updateCommentRequest->validated());
        return new DataResource($comment);
    }

    /**
     * Remove the specified resource from storage.
     * @param Comment $comment
     * @return DataResource
     */
    public function destroy(Comment $comment)
    {
        $comment->Delete();
        return new DataResource($comment);
    }
}
