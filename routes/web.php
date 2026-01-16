<?php

use Illuminate\Support\Facades\Route;
use App\Models\Article;


$team = [
    ['name' => 'Hodor', 'position' => 'programmer'],
    ['name' => 'Joker', 'position' => 'CEO'],
    ['name' => 'Elvis', 'position' => 'CTO'],
];

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () use ($team){
    return view('about', ['team' => $team]);
})->name('about');

Route::get('articles', function () {
    $articles = Article::all();
    return view('articles', ['articles' => $articles]);
});

