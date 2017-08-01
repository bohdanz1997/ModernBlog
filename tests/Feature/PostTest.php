<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostTest extends TestCase
{
    use DatabaseTransactions;

    public function testEdit()
    {
        $category = factory(\App\Category::class)->create();
        $post = factory(\App\Post::class)->create([
            'category_id' => $category->id
        ]);

        $response = $this->call('GET', 'posts.edit');
        //$selectedCategory = $this->getResponseData($response, 'selectedCategory');

        //$this->assertEquals($selectedCategory, $category->id);
    }

    protected function getResponseData($response, $key)
    {
        $content = $response->getOriginalContent();
        $content = $content->getData();

        return $content[$key]->all();
    }
}
