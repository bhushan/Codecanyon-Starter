<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ApplicationSettingsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function unauthorised_users_cant_access_site_settings_route()
    {
        $this->json('get', route('admin.app-settings'))
        ->assertStatus(401);
    }

    /** @test */
    public function only_admin_users_can_access_site_settings_route()
    {
        $this->signInAsAdmin();

        $this->json('get', route('admin.app-settings'))
        ->assertStatus(200)
        ->assertSee('Application Settings');
    }

    /** @test */
    public function it_requires_sitename_description_company_and_siteurl()
    {
        $this->signInAsAdmin();

        $this->post(route('admin.post.app-settings', ['sitename' => null]))
        ->assertSessionHasErrors('sitename');

        $this->post(route('admin.post.app-settings', ['description' => null]))
        ->assertSessionHasErrors('description');

        $this->post(route('admin.post.app-settings', ['siteurl' => null]))
        ->assertSessionHasErrors('siteurl');

        $this->post(route('admin.post.app-settings', ['company' => null]))
        ->assertSessionHasErrors('company');
    }

    /** @test */
    public function it_store_sitename_description_company_and_siteurl()
    {
        $this->signInAsAdmin();

        $response = $this->post(route('admin.post.app-settings', [
            'sitename'    => 'test',
            'description' => 'some description',
            'company'     => 'Enlight Technologies',
            'siteurl'     => 'https://test.test',
        ]));

        $response->assertStatus(302)
        ->assertSessionHas('status', 'Application Settings Updated Successfully');

        $this->assertDatabaseHas('settings', [
            'key'   => 'sitename',
            'value' => 'test',
        ]);

        $this->assertDatabaseHas('settings', [
            'key'   => 'description',
            'value' => 'some description',
        ]);

        $this->assertDatabaseHas('settings', [
            'key'   => 'company',
            'value' => 'Enlight Technologies',
        ]);

        $this->assertDatabaseHas('settings', [
            'key'   => 'siteurl',
            'value' => 'https://test.test',
        ]);
    }
}
