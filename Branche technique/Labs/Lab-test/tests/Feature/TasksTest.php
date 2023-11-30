<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TasksTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        // $this->withoutExceptionHandling();
        $response = $this->get('/tache/1');
        // dd($response->status());
        $response->assertStatus((200));

        // $response->assertSee('Aucun tache trouvé.');
    }

    public function test_create_task_returns_a_successful_response(): void
    {
        // $this->withoutExceptionHandling();
        $response = $this->get('/tache/1/create');
        // dd($response->status());
        $response->assertStatus((200));

        // $response->assertSee('Aucun tache trouvé.');
    }
}
