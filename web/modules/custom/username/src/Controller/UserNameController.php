<?php

namespace Drupal\username\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\user\Controller\UserController;

/**
 *  UserNameController
 * This is created for storing & displaying the current user name. 
 */
class UserNameController extends ControllerBase {

  /**
   * @var userobj :object
   * This is used for storing the object of the class UserController.
   */
  public $userobj;

  /**
   * 
   */
  // public function __construct($date_formatter, $user_storage, $user_data,$logger,$flood) {
  //   $this->userobj = new UserController($date_formatter, $user_storage, $user_data,$logger,$flood);
  // }

  /**
   * @return [type]
   */
  // public function fetchName($date_formatter, $user_storage, $user_data,$logger,$flood) {
  //   $this->userobj = new UserController($date_formatter, $user_storage, $user_data,$logger,$flood);
  //   $userName = $this->userobj->userTitle( $user = NULL);
  //   dump($user);
  // }


}

?>
