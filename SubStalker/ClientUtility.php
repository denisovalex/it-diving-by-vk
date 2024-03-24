<?php

namespace SubStalker;

use VK\Client\VKApiClient;

class ClientUtility
{
  private VKApiClient $client;

  public function __construct(VKApiClient $client)
  {
    $this->client = $client;
  }

  public function getUser(string $user_id)
  {
    try {
      return $this->client->users()->get(Config::$ACCESS_TOKEN, ['user_id' => $user_id, 'fields' => ['sex']])[0];
    } catch (\Exception $e) {
      echo $e;
      return null;
    }
  }

  public function getGroup(int $group_id)
  {
    try {
      return $this->client->groups()->getById(Config::$ACCESS_TOKEN, ['group_id' => $group_id])['groups'][0];
    } catch (\Exception $e) {
      echo $e;
      return null;
    }
  }

  public function sendMessage(string $message_text, int $reciever_id)
  {
    try {
      $this->client->messages()->send(Config::$ACCESS_TOKEN, [
        'user_id' => $reciever_id,
        'random_id' => rand(),
        'message' => $message_text,
      ]);
    } catch (\Exception $e) {
      echo $e;
    }
  }
}