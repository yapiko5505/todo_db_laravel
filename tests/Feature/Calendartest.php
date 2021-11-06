<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class Calendartest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {

        $this->assertStatus(true);
        
        $response = $this->get('/');

        $response->assertStatus(200);

        $response = $this->get('/index');

        $response->assertStatus(302);

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get('/index');

        $response->assertStatus(200);

        $response = $this->get('no_route');

        $response->assretStatus(404);

        
    }
}
