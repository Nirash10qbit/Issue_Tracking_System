<?php

namespace Modules\Tracking\Http\Controllers;

use App\Http\Resources\DataResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Routing\Controller;
use Modules\Core\Entities\Category;
use Modules\Tracking\Http\Requests\CreateCategoryRequest;
use Modules\Tracking\Http\Requests\UpdateCategoryRequest;
use Spatie\QueryBuilder\QueryBuilder;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $categories = QueryBuilder::for(Category::class)
            ->paginate(10);
        return DataResource::collection($categories);
    }


    /**
     * Store a newly created resource in storage.
     * @param CreateCategoryRequest $createCategoryRequest
     * @return DataResource
     */
    public function store(CreateCategoryRequest $createCategoryRequest): DataResource
    {
        $category = Category::create($createCategoryRequest->validated());
        return new DataResource($category);
    }

    /**
     * Show the specified resource.
     * @param Category $category
     * @return DataResource
     */
    public function show(Category $category): DataResource
    {
        Category::whereId($category->id)->firstOrFail();
        return new DataResource($category);

    }


    /**
     * Update the specified resource in storage.
     * @param UpdateCategoryRequest $updateCategoryRequest
     * @param Category $category
     * @return DataResource
     */
    public function update(UpdateCategoryRequest $updateCategoryRequest,Category $category): DataResource
    {
        $category->update($updateCategoryRequest->validated());
        return new DataResource($category);
    }

    /**
     * Remove the specified resource from storage.
     * @param Category $category
     * @return DataResource
     */
    public function destroy(Category $category): DataResource
    {
        $category->Delete();
        return new DataResource($category);
    }
}
