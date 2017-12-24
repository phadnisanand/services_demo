<?php
 
/**
 * @file
 * Contains \Drupal\services_demo\ServiceExampleService.
 */
 
namespace Drupal\services_demo;
 
class ServiceExampleService {
 
  protected $service_example_value;
 
  /**
   * When the service is created, set a value for the example variable.
   */
  public function __construct() {
    $this->service_example_value = 'Student';
  }
 
  /**
   * Return the value of the example variable.
   */
  public function getServiceExampleValue() {
    return $this->service_example_value;
  }
 
}