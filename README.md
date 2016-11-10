# Open Weather
Laravel wrapper for Open Weather

http://openweathermap.org

##Installation

Via Composer

    $ composer require aducworth/openweather:dev-master
    
##Service Provider
    'Aducworth\Openweather\OpenweatherServiceProvider'
    
##Facade
    'Openweather' => 'Aducworth\Openweather\Facades\Openweather'
    

# Usage
Get current weather.

use Openweather;
   
$data = Openweather::byCity({appid},{city},{country=null});

$data = Openweather::byZip({appid},{zip});

$data = Openweather::byCoordinates({appid},{lat},{lon});