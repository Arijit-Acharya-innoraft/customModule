<?php

/**
 * @file 
 * Generate markup to be displayed. Functionality in this controller is
 * wired to Drupal in mymodule.routing.yml.
 */

namespace Drupal\mymodule\Controller;

use Drupal\Core\Controller\ControllerBase;


class FirstController extends ControllerBase {

  public function simpleContent() {
    return [
      '#type' => 'markup',
      '#markup' =>('hello world'),
    ];
  }

  public function greetings($name) {
    return[
      '#type' => 'markup',
      '#markup' =>t('HELLO @name !',
        ['@name' => $name]),
    ];
  }

  public function showName() {
    $user = \Drupal::currentUser();
    $userName = $user->getAccountName();
    return[
      '#type' => 'markup',
      '#markup' => ('Hello '. $userName)
    ];
  }
}