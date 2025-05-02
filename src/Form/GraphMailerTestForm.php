<?php

namespace Drupal\graphmailer\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\graphmailer\GraphMailer;

class GraphMailerTestForm extends FormBase {

  protected $graphMailer;

  public function __construct(GraphMailer $graphMailer) {
    $this->graphMailer = $graphMailer;
  }

  public static function create(ContainerInterface $container) {
    return new static($container->get('graphmailer.mailer'));
  }

  public function getFormId() {
    return 'graphmailer_test_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['to'] = [
      '#type' => 'email',
      '#title' => $this->t('To'),
      '#required' => TRUE,
    ];
    $form['subject'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Subject'),
      '#required' => TRUE,
    ];
    $form['body'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Body (HTML allowed)'),
      '#required' => TRUE,
    ];
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Send Test Email'),
    ];
    return $form;
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    $params = [
      'to' => $form_state->getValue('to'),
      'subject' => $form_state->getValue('subject'),
      'body' => $form_state->getValue('body'),
    ];
    $this->graphMailer->sendMail($params);
    $this->messenger()->addMessage($this->t('Test email sent (or attempted).'));
  }
}
