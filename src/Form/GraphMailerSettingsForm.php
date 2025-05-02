<?php

namespace Drupal\graphmailer\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class GraphMailerSettingsForm extends FormBase {

  public function getFormId() {
    return 'graphmailer_settings_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = \Drupal::config('graphmailer.settings');

    $form['tenant_id'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Tenant ID'),
      '#default_value' => $config->get('tenant_id'),
    ];
    $form['client_id'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Client ID'),
      '#default_value' => $config->get('client_id'),
    ];
    $form['client_secret'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Client Secret'),
      '#default_value' => $config->get('client_secret'),
    ];
    $form['from_address'] = [
      '#type' => 'textfield',
      '#title' => $this->t('From email address'),
      '#default_value' => $config->get('from_address'),
    ];
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Save configuration'),
    ];

    return $form;
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    \Drupal::service('config.factory')->getEditable('graphmailer.settings')
      ->set('tenant_id', $form_state->getValue('tenant_id'))
      ->set('client_id', $form_state->getValue('client_id'))
      ->set('client_secret', $form_state->getValue('client_secret'))
      ->set('from_address', $form_state->getValue('from_address'))
      ->save();

    $this->messenger()->addMessage($this->t('Settings saved.'));
  }
}
