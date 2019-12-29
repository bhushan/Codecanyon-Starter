<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LogoSettingsTest extends TestCase
{
	use RefreshDatabase;

	/** @test */
	public function unauthorised_users_cant_access_site_settings_route()
	{
		$this->json('get', route('admin.logo-settings'))
		->assertStatus(401);
	}

	/** @test */
	public function only_admin_users_can_access_site_settings_route()
	{
		$this->signInAsAdmin();

		$this->json('get', route('admin.logo-settings'))
		->assertStatus(200)
		->assertSee('Logo Settings');
	}
}
