<?php

namespace Drupal\graphmailer;

use GuzzleHttp\ClientInterface;

class GraphMailer {

  protected $config;
  protected $httpClient;

  public function __construct(ClientInterface $http_client) {
    $this->httpClient = $http_client;
    $this->config = \Drupal::config('graphmailer.settings');
  }

  public function sendMail(array $params) {
    $this->httpClient->request('POST',
      'https://graph.microsoft.com/v1.0/users/' . $this->config->get('from_address') . '/sendMail',
      [
        'headers' => [
          'Authorization' => 'Bearer ' . $this->getAccessToken(),
          'Content-Type' => 'application/json',
        ],
        'json' => [
          'message' => [
            'subject' => $params['subject'],
            'body' => [
              'contentType' => 'HTML',
              'content' => $params['body'],
            ],
            'toRecipients' => [[
              'emailAddress' => [
                'address' => $params['to'],
              ],
            ]],
          ],
          'saveToSentItems' => 'true',
        ]
      ]
    );
  }

  private function getAccessToken() {
    $response = $this->httpClient->request('POST',
      'https://login.microsoftonline.com/' . $this->config->get('tenant_id') . '/oauth2/v2.0/token',
      [
        'form_params' => [
          'grant_type' => 'client_credentials',
          'client_id' => $this->config->get('client_id'),
          'client_secret' => $this->config->get('client_secret'),
          'scope' => 'https://graph.microsoft.com/.default',
        ],
      ]
    );
    $data = json_decode($response->getBody()->getContents(), true);
    return $data['access_token'];
  }
}
