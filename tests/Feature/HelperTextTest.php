<?php

namespace Tests\Feature;

use App\Livewire\ShowHelp;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class HelperTextTest extends TestCase
{
    public function test_can_see_helper_text()
    {
        Livewire::test(ShowHelp::class)
            ->assertDontSee('Lorem ipsum')
            ->toggle('ShowHelp')
            ->assertSee('Lorem ipsum');
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
