<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserSettingsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function unauthenticated_users_cant_access_user_settings_route()
    {
        $this->json('get', route('user-settings'))
            ->assertStatus(401);
    }

    /** @test */
    public function authenticated_users_can_access_user_settings_route()
    {
        $this->signIn();

        $this->json('get', route('user-settings'))
                ->assertStatus(200)
                ->assertSee('User Settings');
    }

    /** @test */
    public function it_requires_name()
    {
        $this->signIn();

        $this->patch(route('patch.user-settings'), ['name' => null])
        ->assertSessionHasErrors('name');
    }

    /** @test */
    public function it_requires_email()
    {
        $this->signIn();

        $this->patch(route('patch.user-settings'), ['email' => null])
        ->assertSessionHasErrors('email');
    }

    /** @test */
    public function it_updates_name_and_email()
    {
        $this->signIn();

        $response = $this->patch(route('patch.user-settings'), [
            'name'  => 'johndoe',
            'email' => 'john@test.com',
        ]);

        $response->assertStatus(302)
                    ->assertSessionHas('status', 'User Settings Updated Successfully');

        $this->assertDatabaseHas('users', [
            'name'  => 'johndoe',
            'email' => 'john@test.com',
        ]);
    }

    /** @test */
    public function it_requires_current_password_for_updating_new_password()
    {
        $this->signIn();

        $this->patch(route('patch.user-password'), ['current_password' => null])
            ->assertSessionHasErrors('current_password');
    }

    /** @test */
    public function it_requires_new_password_for_updating_new_password()
    {
        $this->signIn();

        $this->patch(route('patch.user-password'), ['password' => null])
            ->assertSessionHasErrors('password');
    }

    /** @test */
    public function it_requires_validate_current_password_authenticity()
    {
        $current_password = bcrypt('password');

        $user = create('App\User', [
            'password' => $current_password,
        ]);

        $this->signIn($user);

        $this->patch(route('patch.user-password'), [
            'current_password'      => 'wrongPassword',
            'password'              => 'newpassword',
            'password_confirmation' => 'newpassword',
        ])
            ->assertSessionHasErrors('current_password');
    }

    /** @test */
    public function authorised_user_can_update_its_password()
    {
        $current_password = bcrypt('password');

        $user = create('App\User', [
            'password' => $current_password,
        ]);

        $this->signIn($user);

        $response = $this->patch(route('patch.user-password'), [
            'current_password'      => 'password',
            'password'              => 'newpassword',
            'password_confirmation' => 'newpassword',
        ]);

        $response->assertStatus(302)
        ->assertSessionHas('status', 'Password Updated Successfully');

        $this->assertTrue(\Hash::check('newpassword', $user->fresh()->password));
    }
}
