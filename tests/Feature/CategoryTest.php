<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class CategoryTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * is st
     *
     * @return void
     */
    public function testStore()
    {
        $category = factory(\App\Category::class)->create(
            $this->validParams()
        );

        $this->assertDatabaseHas('categories', $this->validParams());
    }

    private function validParams($overrides = [])
    {
        return array_merge([
            'name' => 'Super Category',
            'description' => 'This is great description!'
        ], $overrides);
    }
}
