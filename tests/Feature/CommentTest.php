<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CommentTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * it stores a new comment
     *
     * @return void
     */
    public function testStore()
    {
        $params = $this->validParams();
        $response = $this->post('/comments/store', $params);

        $this->assertDatabaseHas('comments', $params);
    }

    /**
     * it returns errors when param's missing
     *
     * @return void
     */
    public function testStoreFail()
    {
        $response = $this->post('/comments/store', $this->validParams([
            'content' => null
        ]));

        $response
            ->assertStatus(302)
            ->assertSessionHas('errors');
    }

    private function validParams($overrides = [])
    {
        return array_merge([
            'post_id' => factory(\App\Post::class)->create([
                'category_id' => factory(\App\Category::class)->create()->id
            ])->id,
            'content' => 'Great article! Thanks',
            'author' => 'Ben Kenoby'
        ], $overrides);
    }
}
