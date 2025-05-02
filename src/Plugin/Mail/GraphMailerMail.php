<?php

namespace Drupal\graphmailer\Plugin\Mail;

use Drupal\Core\Mail\MailInterface;
use Drupal\graphmailer\GraphMailer;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;

/**
 * Defines the GraphMailer implementation of MailInterface.
 *
 * @Mail(
 *   id = "graphmailer",
 *   label = @Translation("GraphMailer")
 * )
 */
class GraphMailerMail implements MailInterface, ContainerFactoryPluginInterface {

  /**
   * The GraphMailer service.
   *
   * @var \Drupal\graphmailer\GraphMailer
   */
  protected $mailer;

  /**
   * Constructs a GraphMailerMail object.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, GraphMailer $mailer) {
    $this->mailer = $mailer;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('graphmailer.mailer')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function format(array $message) {
    // Return the message as-is. Drupal will use it unmodified.
    return $message;
  }

  /**
   * {@inheritdoc}
   */
  public function mail(array $message) {
    $params = [
      'to' => $message['to'],
      'subject' => $message['subject'],
      'body' => is_array($message['body']) ? implode("\n", $message['body']) : $message['body'],
    ];

    $this->mailer->sendMail($params);
    return TRUE;
  }

}
