<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_checks_if_it_has_any_role()
    {
        $user = create('App\User');

        $this->assertFalse($user->hasAnyRole('admin'));
        $this->assertFalse($user->hasAnyRole(['admin']));

        $admin_role = create('App\Role', ['name' => 'admin']);

        $user->roles()->attach($admin_role);

        $this->assertTrue($user->hasAnyRole('admin'));
        $this->assertTrue($user->hasAnyRole(['admin']));
    }

    /** @test */
    public function user_has_default_avatar()
    {
        $user = create('App\User');

        $this->assertEquals(asset('avatars/default.png'), $user->avatar);
    }
}
