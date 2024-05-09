<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;

// PublicController
Route::get('/', [PublicController::class, "homepage"])->name("homepage");

Route::get('/article/create', [ArticleController::class, "create"])->name("article.create")->middleware("auth");
