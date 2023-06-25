<?php

/**
 * @file 
 * Generate markup to be displayed. Functionality in this controller is
 * wired to Drupal in mymodule.routing.yml.
 */

namespace Drupal\mymodule\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * This class is a multipurpose utility class.
 * it is used for testing simple markups,getAccountName function.  
 */
class FirstController extends ControllerBase {

  /**
   * @return [array]
   *  A render array to display the hello message
   */
  public function simpleContent() {
    return [
      '#type' => 'markup',
      '#markup' =>'hello world',
    ];
  }

  /**
   * @param string $name
   *  It takes the name from the url.
   * 
   * @return [array]
   *  A render array to display the hello message
   */
  public function greetings($name) {
    return[
      '#type' => 'markup',
      '#markup' =>t('HELLO @name !', [
        '@name' => $name
      ]),
    ];
  }

  /**
   * @return [array]
   *  A render array to display the hello message
   */
  public function showName() {
    $user = \Drupal::currentUser();
    $userName = $user->getAccountName();
    return[
      '#type' => 'markup',
      '#markup' => ('Hello '. $userName)
    ];
  }
}