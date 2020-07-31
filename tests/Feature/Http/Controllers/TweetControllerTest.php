<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Http\Response;
use App\Models\Tweet;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;


class TweetControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $authUser;

    protected function setUp(): void
    {
        parent::setUp();

        $this->authUser = factory(User::class)->create();
        $this->actingAs($this->authUser);
    }


    /**
     * @test
     */
    public function TweetIndex() 
    {
        $response = $this->get('/tweets');

        $response->assertStatus(Response::HTTP_OK);
        $response->assertSee('ツイート新規投稿');
    }

    /**
     * @test
     */
    public function TweetCreate() 
    {
        $response = $this->get('/tweets/create');

        $response->assertStatus(Response::HTTP_OK);
        $response->assertSee('投稿する');
    }

    /**
     * @test
     */
    public function TweetShow() 
    {
        $tweet = factory(Tweet::class)->create(['user_id' => $this->authUser->id ]);

        $response = $this->get("/tweets/{$tweet->id}");

        $response->assertStatus(Response::HTTP_OK);
        $response->assertSee($tweet->body);
    }

    /**
     * @test
     */
    public function TweetEdit() 
    {
        $tweet = factory(Tweet::class)->create(['user_id' => $this->authUser->id ]);

        $response = $this->get("/tweets/{$tweet->id}/edit");

        $response->assertStatus(Response::HTTP_OK);
        $response->assertSee($tweet->body);
    }
}
