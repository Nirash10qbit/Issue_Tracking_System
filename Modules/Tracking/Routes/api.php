<?php

use Illuminate\Http\Request;
use Modules\Tracking\Http\Controllers\CategoryController;
use Modules\Tracking\Http\Controllers\CommentController;
use Modules\Tracking\Http\Controllers\ImageController;
use Modules\Tracking\Http\Controllers\IssueController;
use Modules\Tracking\Http\Controllers\SubCategoryController;
use Modules\Tracking\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/tracking', function (Request $request) {
//    return $request->user();
//});

Route::apiResource('/categories',  'CategoryController');
Route::apiResource('/subcategories', 'SubCategoryController');
Route::apiResource('/comments', 'CommentController');
Route::apiResource('/issues', 'IssueController');
Route::apiResource('/images', 'ImageController');
Route::apiResource('/users', 'UserController');
