<?php
 
/**
 * @file
 * Contains \Drupal\services_demo\WeatherUndergroundService.
 */
 
namespace Drupal\services_demo;
use GuzzleHttp\Client;
 
class WeatherUndergroundService {
 
  protected $http_client;
 
  /**
   * When the service is created, set a value for the example variable.
   */
  public function __construct(Client $http_client) {
    $this->http_client = $http_client;
  }
  
  public function getCurrentWeather() {
    $request = $this->http_client->get('http://samples.openweathermap.org/data/2.5/weather?lat=35&lon=139&appid=b6907d289e10d714a6e88b30761fae22');
     $response = json_decode($request->getBody());
    return  $response ;
  }
}