<?php

namespace Modules\Tracking\Http\Controllers;

use App\Http\Resources\DataResource;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Routing\Controller;
use Modules\Core\Entities\Comment;
use Modules\Core\Entities\Issue;
use Modules\Tracking\Http\Requests\CreateCommentRequest;
use Modules\Tracking\Http\Requests\CreateIssueRequest;
use Modules\Tracking\Http\Requests\UpdateCommentRequest;
use Modules\Tracking\Http\Requests\UpdateIssueRequest;
use Spatie\QueryBuilder\QueryBuilder;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $issuess = QueryBuilder::for(Issue::class)
            ->paginate(10);
        return DataResource::collection($issuess);
    }


    /**
     * Store a newly created resource in storage.
     * @param CreateIssueRequest $createIssueRequest
     * @return DataResource
     */
    public function store(CreateIssueRequest $createIssueRequest): DataResource
    {
        $issue = Issue::create($createIssueRequest->validated());
        return new DataResource($issue);
    }

    /**
     * Show the specified resource.
     * @param Issue $issue
     * @return DataResource
     */
    public function show(Issue $issue): DataResource
    {
        Issue::whereId($issue->id)->firstOrFail();
        return new DataResource($issue);
    }


    /**
     * Update the specified resource in storage.
     * @param UpdateIssueRequest $updateIssueRequest
     * @param Issue $issue
     * @return DataResource
     */
    public function update(UpdateIssueRequest $updateIssueRequest,Issue $issue): DataResource
    {
        $issue->update($updateIssueRequest->validated());
        return new DataResource($issue);
    }

    /**
     * Remove the specified resource from storage.
     * @param Issue $issue
     * @return DataResource
     */
    public function destroy(Issue $issue): DataResource
    {
        $issue->Delete();
        return new DataResource($issue);
    }
}
