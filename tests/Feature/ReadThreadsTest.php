<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ThreadsTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();

        $this->thread = factory('App\Thread')->create();
    }

    public function test_user_can_see_threads()
    {
        $response = $this->get('/threads');
        $response->assertSee($this->thread->title);
    }

    public function test_user_can_see_single_thread()
    {
        $response = $this->get( $this->thread->path());
        $response->assertSee($this->thread->title);
    }

    public function test_user_can_browse_threads()
    {
        $response = $this->get('/threads');
        $response->assertStatus(200);
    }

    // public function test_user_can_see_replies()
    // {
    //     $reply = factory('App\Reply')
    //         ->create(['thread_id' => $this->thread->id]);

    //     $this->get('/threads/' . $this->thread->id)
    //         ->assertSee($reply->body);
    // }
}
