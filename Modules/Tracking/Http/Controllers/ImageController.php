<?php

namespace Modules\Tracking\Http\Controllers;

use App\Http\Resources\DataResource;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Routing\Controller;
use Modules\Core\Entities\Comment;
use Modules\Core\Entities\Image;
use Modules\Tracking\Http\Requests\CreateCommentRequest;
use Modules\Tracking\Http\Requests\CreateImageRequest;
use Modules\Tracking\Http\Requests\UpdateCommentRequest;
use Modules\Tracking\Http\Requests\UpdateImageRequest;
use Spatie\QueryBuilder\QueryBuilder;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $images = QueryBuilder::for(Image::class)
            ->paginate(10);
        return DataResource::collection($images);
    }


    /**
     * Store a newly created resource in storage.
     * @param CreateImageRequest $createImageRequest
     * @return DataResource
     */
    public function store(CreateImageRequest $createImageRequest): DataResource
    {
        $image = Image::create($createImageRequest->validated());
        return new DataResource($image);
    }

    /**
     * Show the specified resource.
     * @param Image $image
     * @return DataResource
     */
    public function show(Image $image): DataResource
    {
        Image::whereId($image->id)->firstOrFail();
        return new DataResource($image);
    }


    /**
     * Update the specified resource in storage.
     * @param UpdateImageRequest $updateImageRequest
     * @param Image $image
     * @return DataResource
     */
    public function update(UpdateImageRequest $updateImageRequest,Image $image): DataResource
    {
        $image->update($updateImageRequest->validated());
        return new DataResource($image);
    }

    /**
     * Remove the specified resource from storage.
     * @param Image $image
     * @return DataResource
     */
    public function destroy(Image $image)
    {
        $image->Delete();
        return new DataResource($image);
    }
}
