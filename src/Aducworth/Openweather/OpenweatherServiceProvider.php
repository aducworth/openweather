<?php
	
namespace Aducworth\Openweather;

use Illuminate\Support\ServiceProvider;

use Aducworth\Openweather\OpenWeather;

class OpenweatherServiceProvider extends ServiceProvider {
	public function register() 
	{
		$this->app->singleton('openweather', function ($app) {
			return new OpenWeather;
		});
	}
	public function provides()
	{
		return ['openweather'];
	}
}