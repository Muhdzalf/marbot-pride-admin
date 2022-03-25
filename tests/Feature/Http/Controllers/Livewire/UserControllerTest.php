<?php

namespace Tests\Feature\Http\Controllers\Livewire;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function it_create_user()
    {
        // $user = factory(User::class)->create();
    }
}
