<?php
	
namespace Aducworth\Openweather;

class OpenWeather
{
	protected $endpoint = "http://api.openweathermap.org/data/2.5/weather";
	
	public function byZip($appid,$zip)
	{
		$url = ( self::$endpoint . "?appid=" . $appid . "&zip=" . $zip );
		$response = self::getCurl($url);
		return json_decode( $response );
	}
	
	public function byCity($appid,$city,$country=null)
	{
		$url = ( self::$endpoint . "?appid=" . $appid . "&q=" . $city . ( $country ?(',' . $country):'' ) );
		$response = self::getCurl($url);
		return json_decode( $response );
	}
	
	public function byCoordinates($appid,$lat,$lon)
	{
		$url = ( self::$endpoint . "?appid=" . $appid . "&lat=" . $lat . "&lon=" . $lon );
		$response = self::getCurl($url);
		return json_decode( $response );
	}
	
	public function getCurl($url)
	{
		if(function_exists('curl_exec')) {
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
			curl_setopt($ch, CURLOPT_TIMEOUT, 60);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$response = curl_exec($ch);
			curl_close($ch);
		}
		if (empty($response)) {
			$response = file_get_contents($url);
		}
		return $response;
	}
}