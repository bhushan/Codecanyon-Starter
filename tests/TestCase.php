<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
	use CreatesApplication;

	protected function signIn($user = null)
	{
		$user = $user ?: create('App\User');

		$this->actingAs($user);

		return $this;
	}

	protected function signInAsAdmin($user = null)
	{
		$user = $user ?: create('App\User');

		$admin_role = create('App\Role', ['name' => 'admin']);

		$user->roles()->attach($admin_role);

		$this->actingAs($user);

		return $this;
	}
}
