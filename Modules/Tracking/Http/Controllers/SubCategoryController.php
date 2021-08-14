<?php

namespace Modules\Tracking\Http\Controllers;

use App\Http\Resources\DataResource;
use Modules\Core\Entities\Category;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Routing\Controller;
use Modules\Core\Entities\Subcategory;
use Modules\Tracking\Http\Requests\CreateSubcategoryRequest;
use Modules\Tracking\Http\Requests\UpdateSubcategoryRequest;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Category $category
     * @return AnonymousResourceCollection
     */
    public function index(Category $category): AnonymousResourceCollection
    {
        $subcategories = QueryBuilder::for($category->subcategories())
            ->paginate(10);
        return DataResource::collection($subcategories);
    }


    /**
     * Store a newly created resource in storage.
     * @param CreateSubcategoryRequest $createSubcategoryRequest
     * @param Category $category
     * @return DataResource
     */
    public function store(CreateSubcategoryRequest $createSubcategoryRequest,Category $category): DataResource
    {
        $subcategory = Subcategory::create(collect($createSubcategoryRequest->validated())
        ->put('Category_id',$category->id)->toArray());
        return new DataResource($subcategory);
    }

    /**
     * Show the specified resource.
     * @param Subcategory $subcategory
     * @param Category $category
     * @return DataResource
     */
    public function show(Category $category, Subcategory $subcategory): DataResource
    {
        Subcategory::whereCategoryId($category->id)->whereId($subcategory->id)->firstOrFail();
        return new DataResource($subcategory);
    }


    /**
     * Update the specified resource in storage.
     * @param UpdateSubcategoryRequest $updateSubcategoryRequest
     * @param Category $category
     * @param Subcategory $subcategory
     * @return DataResource
     */
    public function update(UpdateSubcategoryRequest $updateSubcategoryRequest,Category $category,Subcategory $subcategory): DataResource
    {
        $subcategory->update($updateSubcategoryRequest->validated());
        return new DataResource($subcategory);
    }

    /**
     * Remove the specified resource from storage.
     * @param Category $category
     * @param Subcategory $subcategory
     * @return DataResource
     */
    public function destroy(Category $category,Subcategory $subcategory)
    {
        $subcategory->Delete();
        return new DataResource($subcategory);
    }
}
