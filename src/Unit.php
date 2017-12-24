<?php

/**
 * @file
 * Contains \Drupal\services_demo\Unit.
 */

namespace Drupal\services_demo;

use Drupal\Core\Plugin\PluginBase;
use Drupal\services_demo\UnitInterface;

/**
 * Class Unit.
 */
class Unit extends PluginBase implements UnitInterface {

  /**
   * {@inheritdoc}
   */
  public function getFactor() {
    return (float) $this->pluginDefinition['factor'];
  }

  /**
   * {@inheritdoc}
   */
  public function getLabel() {
    return $this->t($this->pluginDefinition['label'], array(), array('context' => 'unit'));
  }

  /**
   * {@inheritdoc}
   */
  public function getUnit() {
    return $this->pluginDefinition['unit'];
  }

  /**
   * {@inheritdoc}
   */
  public function toBase($value) {
    return $this->round($value * $this->getFactor());
  }

  /**
   * {@inheritdoc}
   */
  public function fromBase($value) {
    return $this->round($value / $this->getFactor());
  }

  /**
   * {@inheritdoc}
   */
  public function round($value) {
    return round($value, 5);
  }

  /**
   * Returns the unit's label.
   *
   * @return string
   *   Unit label.
   */
  public function __toString() {
    return $this->getLabel();
  }
}