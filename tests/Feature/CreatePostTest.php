<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Post;
use Livewire\Livewire;
use App\Livewire\CreatePost;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreatePostTest extends TestCase
{
    use DatabaseMigrations;

    public function test_post_is_created()
    {
        Livewire::test(CreatePost::class)
            ->set('form.title', 'Secret Title')
            ->set('form.body', 'Secret Body')
            ->call('save')
            ->assertSet('success', true);

        $this->assertDatabaseHas('posts', ['title' => 'Secret Title', 'body' => 'Secret Body']);
    }
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
