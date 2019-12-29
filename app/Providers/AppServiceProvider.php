<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Setting;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Register any application services.
	 */
	public function register()
	{
		\View::composer('*', function ($view) {
			$settings = \Cache::rememberForever('settings', function () {
				return Setting::all();
			});

			$view->with('settings', $settings);
		});
	}

	/**
	 * Bootstrap any application services.
	 */
	public function boot()
	{
		Schema::defaultStringLength(191);
	}
}
