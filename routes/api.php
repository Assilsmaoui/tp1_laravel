<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ScategoriesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
/*Route::get("categories",[CategorieController::class,"index"]);
Route::post('/categorie', [CategorieController::class, "store"]);
Route::get('/categories/{id}', [CategorieController::class, "show"]);
Route::delete('/categories/{id}', [CategorieController::class, "destroy"]);
Route::PUT('/categories/{id}', [CategorieController::class, "update"]);*/
Route::middleware('api')->group(function () {
    Route::resource("/categories",CategorieController::class);});

    Route::middleware('api')->group(function () { 
        Route::resource('scategories', ScategoriesController::class);    
             
}); 
Route::middleware('api')->group(function () { 
    Route::resource('articles', ArticleController::class);    
         
}); 
Route::get('/listarticles/{idscat}',[ArticleController::class,'showArticle']);
Route::get('/articles/art/articlespaginate', [ArticleController::class, 
'articlesPaginate']);
