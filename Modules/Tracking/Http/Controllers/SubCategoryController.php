<?php

namespace Modules\Tracking\Http\Controllers;

use App\Http\Resources\DataResource;
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
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $subcategories = QueryBuilder::for(Subcategory::class)
            ->paginate(10);
        return DataResource::collection($subcategories);
    }


    /**
     * Store a newly created resource in storage.
     * @param CreateSubcategoryRequest $CreateSubcategoryRequest
     * @return DataResource
     */
    public function store(CreateSubcategoryRequest $CreateSubcategoryRequest): DataResource
    {
        $subcategory = Subcategory::create($CreateSubcategoryRequest->validated());
        return new DataResource($subcategory);
    }

    /**
     * Show the specified resource.
     * @param Subcategory $subcategory
     * @return DataResource
     */
    public function show(Subcategory $subcategory): DataResource
    {
        $subcategory = Subcategory::whereId($subcategory->id)->firstOrFail();
        return new DataResource($subcategory);
    }



    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdateSubcategoryRequest $updateSubcategoryRequest, Subcategory $subcategory): DataResource
    {
        $subcategory->update($updateSubcategoryRequest->validated());
        return new DataResource($subcategory);
    }

    /**
     * Remove the specified resource from storage.
     * @param Subcategory $subcategory
     * @return DataResource
     */
    public function destroy(Subcategory $subcategory)
    {
        $subcategory->Delete();
        return new DataResource($subcategory);
    }
}
