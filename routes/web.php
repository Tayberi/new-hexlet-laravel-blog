<?php

use Illuminate\Support\Facades\Route;
use App\Models\Article;
use App\Http\Controllers\PageController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('about', [PageController::class, 'about'])->name('about');


Route::get('articles', function () {
    $articles = Article::all();
    return view('articles', ['articles' => $articles]);
});
