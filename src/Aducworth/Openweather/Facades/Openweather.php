<?php
	
namespace Aducworth\Openweather\Facades;

use Illuminate\Support\Facades\Facade;

class Openweather extends Facade 
{
	protected static function getFacadeAccessor() {
		return 'openweather';
	}
}