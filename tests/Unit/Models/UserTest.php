<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use Illuminate\Http\Response;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Tweet;
use App\Models\UserProfile;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function HasManyTweet()
    {
        $user = factory(User::class)->create();
        $tweet = factory(Tweet::class)->create(['user_id' => $user->id ]);

        $this->assertTrue($user->tweets->contains($tweet));
        $this->assertEquals(1, $user->tweets->count());
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $user->tweets);
    }

    /**
     * @test
     */
    public function hasOneProfile()
    {
        $user = factory(User::class)->create();
        $userProfile = factory(UserProfile::class)
                        ->create(['user_id' => $user->id]);

        $this->assertInstanceOf(UserProfile::class, $user->userProfile); 
        $this->assertEquals(1, $user->userProfile->count()); 
    }

}
