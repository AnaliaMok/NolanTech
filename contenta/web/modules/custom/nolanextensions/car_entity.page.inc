<?php

/**
 * @file
 * Contains car_entity.page.inc.
 *
 * Page callback for Car entity entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Car entity templates.
 *
 * Default template: car_entity.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_car_entity(array &$variables) {
  // Fetch CarEntity Entity Object.
  $car_entity = $variables['elements']['#car_entity'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
