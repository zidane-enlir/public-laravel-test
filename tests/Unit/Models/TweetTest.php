<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use Illuminate\Http\Response;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Tweet;

class TweetTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function BelongsToUser()
    {
        $user = factory(User::class)->create();
        $phone = factory(Tweet::class)->create(['user_id' => $user->id]); 

        $this->assertInstanceOf(User::class, $phone->user);
    }
}
