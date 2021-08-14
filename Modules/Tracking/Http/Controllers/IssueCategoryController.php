<?php

namespace Modules\Tracking\Http\Controllers;

use App\Http\Resources\DataResource;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Routing\Controller;
use Modules\Core\Entities\IssueCategory;
use Modules\Core\Entities\Category;
use Spatie\QueryBuilder\QueryBuilder;

class IssueCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Category $category
     * @return AnonymousResourceCollection
     */
    public function index(Category $category): AnonymousResourceCollection
    {
        $issue_categories = QueryBuilder::for($category->issues_->with([
            'issues:id,issue_id',
            'issues.issue:id,title,body,uuid,slug'
        ]))
        ->paginate(10);
        return DataResource::collection($issue_categories);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('tracking::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('tracking::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('tracking::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
