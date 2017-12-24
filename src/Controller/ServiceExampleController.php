<?php
 
/**
 * @file
 * Contains \Drupal\services_demo\ServiceExampleController.
 */
 
namespace Drupal\services_demo\Controller;
 
use Drupal\services_demo\ServiceExampleService;
use Drupal\services_demo\WeatherUndergroundService;
use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class ServiceExampleController extends ControllerBase {
 
  /**
   * @var \Drupal\services_demo\ServiceExampleService
   * @var \Drupal\services_demo\WeatherUndergroundService
   */
  protected $serviceExampleService;
  protected $weatherUndergroundService;
  /**
   * {@inheritdoc}
   */
  public function __construct(ServiceExampleService $serviceExampleService,WeatherUndergroundService $weatherUndergroundService) {
    $this->serviceExampleService = $serviceExampleService;
    $this->weatherUndergroundService = $weatherUndergroundService; 
  }
 
  public static function create(ContainerInterface $container)
  {
      $serviceExampleService = $container->get('services_demo.example_service');
      $weatherUndergroundService = $container->get('services_demo.weather_underground');

      return new static($serviceExampleService,$weatherUndergroundService);
  }

  public function simple_example() {
    return [
      '#markup' => $this->serviceExampleService->getServiceExampleValue()
    ];
  }

  public function http_demo() {
    $response = new JsonResponse();
    $response->setData($this->weatherUndergroundService->getCurrentWeather());
    return $response;
  }

  public function custom_demo() {
      $text_reply = \Drupal::service('services_demo.example_service')->getServiceExampleValue();
      return [
       '#markup' => $text_reply
      ];
  }

  public function custom_language() {
    $language =  \Drupal::languageManager()->getCurrentLanguage()->getName();
    return [
       '#markup' => $language
      ];
  }
}