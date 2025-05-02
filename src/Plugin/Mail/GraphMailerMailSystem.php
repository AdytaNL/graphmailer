<?php

namespace Drupal\graphmailer\Plugin\Mail;

use Drupal\Core\Mail\MailInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Defines GraphMailer mail plugin.
 *
 * @Mail(
 *   id = "graphmailer",
 *   label = @Translation("GraphMailer"),
 *   description = @Translation("Sends mail using Microsoft Graph API.")
 * )
 */
class GraphMailerMailSystem implements MailInterface, ContainerFactoryPluginInterface {

  protected $graphMailer;

  public function __construct(array $configuration, $plugin_id, $plugin_definition, $graphMailer) {
    $this->graphMailer = $graphMailer;
  }

  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static($configuration, $plugin_id, $plugin_definition, $container->get('graphmailer'));
  }

  public function format(array $message) {
    return $message;
  }

  public function mail(array $message) {
    $this->graphMailer->sendMail([
      'to' => $message['to'],
      'subject' => $message['subject'],
      'body' => $message['body'],
    ]);
    return TRUE;
  }
}