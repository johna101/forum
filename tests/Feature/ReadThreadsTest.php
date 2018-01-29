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

    /** @test */
    public function user_can_see_threads()
    {
        $response = $this->get('/threads');
        $response->assertSee($this->thread->title);
    }

    /** @test */
    public function user_can_see_single_thread()
    {
        $response = $this->get( $this->thread->path());
        $response->assertSee($this->thread->title);
    }

    /** @test */
    public function user_can_browse_threads()
    {
        $response = $this->get('/threads');
        $response->assertStatus(200);
    }

    /** @test */
    // public function test_user_can_see_replies()
    // {
    //     $reply = factory('App\Reply')
    //         ->create(['thread_id' => $this->thread->id]);

    //     $this->get('/threads/' . $this->thread->id)
    //         ->assertSee($reply->body);
    // }

    /** @test */
    function a_user_can_filter_threads_by_a_channel()
    {
        $channel = create('App\Channel');
        $thread = create('App\Thread', ['channel_id' => $channel->id]);
        $threadNotInChannel = create('App\Thread');

        $this->get('/threads/' . $channel->slug)
            ->assertSee($thread->title)
            ->assertDontSee($threadNotInChannel->title);
    }
}
