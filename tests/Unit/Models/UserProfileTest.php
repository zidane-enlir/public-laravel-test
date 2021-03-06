<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use Illuminate\Http\Response;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\UserProfile;

class UserProfileTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function BelongsToUser()
    {
        $user = factory(User::class)->create();
        $userProfile = factory(UserProfile::class)
                        ->create(['user_id' => $user->id]);

        $this->assertInstanceOf(User::class, $userProfile->user);
    }
}
