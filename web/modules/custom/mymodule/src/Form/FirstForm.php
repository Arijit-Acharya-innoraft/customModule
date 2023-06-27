<?php

namespace Drupal\mymodule\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class FirstForm extends FormBase {
  
  function getFormId() {
    return 'custom_form_id';
  }

  function buildForm(array $form, FormStateInterface $form_state) {

    $form['full_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Full Name')
    ];
    $form['phone_no'] = [
      '#type' => 'tel',
      '#title' => $this->t('Phone Number')
    ];

    $form['email'] = [
      '#type' => 'email' ,
      '#title' => $this->t("Email")
    ];

    $form['gender'] = [
      '#type' => 'radios',
      '#title' => $this->t('Gender'),
      '#options' => array('Male'=>('Male'),'Female'=>('Female'),'Others'=> ('Others'))
    ];
    
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];

    return $form;
  }

  function validateForm(array &$form, FormStateInterface $form_state) {
    $publicDomains = [];
    $email =$form_state->getValue('email');
    $locAtTheRate = strrpos($email,"@") +1;
    $substring = substr($email,$locAtTheRate);
    $locDot = strrpos($substring,".");
    $domainName = substr($substring,0,$locDot);

    // Validation of Full name.
    if(preg_match("/^[a-zA-Z]+$/",$form_state->getValue('full_name')) == FALSE ) {
      $form_state->setErrorByName('full_name',$this->t('Only text allowed'));
    }

    // Validation of Phone Number.
    if(preg_match("/^[0-9]+$/", $form_state->getValue('phone_no')) == FALSE){
      $form_state->setErrorByName('phone_no',$this->t('Only numbers are allowed'));
    }
    
    if(strlen($form_state->getValue('phone_no'))!=10){
      $form_state ->setErrorByName('phone_no',$this->t('Enter a valid phone no'));
    }

    // Validation of email.
    if(preg_match("/^[a-zA-Z0-9\+\-\_\~\.\@]+$/",$form_state->getValue('email'))==FALSE){
      $form_state->setErrorByName('email',$this->t('Input proper email id'));
    }
    if(!str_ends_with($form_state->getValue('email'),".com")) {
      $form_state->setErrorByName('email',$this->t('You will be blacklisted'));
    }
    if(!in_array($domainName,$publicDomains)){
      $form_state->setErrorByName('email',$this->t('Not in public domain'));
    }
  }

  function submitForm(array &$form, FormStateInterface $form_state){

    $this->messenger()->addStatus($this->t('Your form is submitted'));

  }
}

?>
