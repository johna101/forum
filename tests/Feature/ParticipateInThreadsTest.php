<?php
 
namespace Tests\Feature;
 
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
 
class ParticipateInThreadsTest extends TestCase
{
    use DatabaseMigrations;
 
    /** @test */
    function unauthenticated_users_may_not_add_replies()
    {
        $this->withExceptionHandling()
            ->post('/threads/some-channel/1/replies', [])
            ->assertRedirect('/login');
    }
 
    /** @test */
    function an_authenticated_user_may_participate_in_forum_threads()
    {
        $this->signIn();
 
        $thread = create('App\Thread');
        $reply = make('App\Reply');

        $this->post($thread->path() . '/replies', $reply->toArray());
 
        $this->get($thread->path())
            ->assertSee($reply->body);
    }

    /** @test */
    function a_reply_requires_a_body()
    {
        $this->publishReply(['body' => null])
            ->assertSessionHasErrors('body');
    }

    public function publishReply(Array $overrides = [])
    {
        $this->withExceptionHandling()->signIn();
        $thread = create('App\Thread');

        $reply = make('App\Reply', $overrides);
        return $this->post($thread->path() . '/replies', $reply->toArray());
    }
}
 
