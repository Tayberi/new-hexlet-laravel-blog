<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AppTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('<a href="/about">', false);
    }

    public function testAbout()
    {
        $response = $this->get('/about');
        $response->assertStatus(200);
        $response->assertSee('<h1>О блоге</h1>', false);
    }

    public function testArticles()
    {
        $response = $this->get('/articles');
        $response->assertStatus(200);
    }

    public function testArticle()
    {
        $columns = \Schema::getColumnListing('articles');
        $this->assertContains('views_count', $columns, json_encode($columns));
    }

    public function testArticlesCreate()
    {
        $article = \App\Models\Article::factory()->create();
        $response = $this->get('/articles');
        $response->assertStatus(200);
        $response->assertSeeText(htmlentities($article->name));
        $response->assertSeeText(htmlentities($article->body));
    }
}
