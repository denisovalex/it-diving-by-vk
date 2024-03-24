<?php

namespace SubStalker;

use VK\CallbackApi\VKCallbackApiHandler;
use VK\Client\VKApiClient;

class CallbacksHandler extends VKCallbackApiHandler
{
  private ClientUtility $client;

  public function __construct(VKApiClient $client)
  {
    $this->client = new ClientUtility($client);
  }

  public function groupLeave(int $group_id, ?string $secret, array $object)
  {
    $user_id = $object['user_id'];

    $user = $this->client->getUser($user_id);
    $group = $this->client->getGroup(Config::$GROUP_ID);

    if (!$user) {
      echo "error loading user {$user_id}\n";
      return;
    }

    if (!$group) {
      echo "error loading group {$group_id}\n";
      return;
    }

    $this->client->sendMessage(MessageCreator::getUnsubText($user, $group));
  }

  public function groupJoin(int $group_id, ?string $secret, array $object)
  {
    $user_id = $object['user_id'];

    $user = $this->client->getUser($user_id);
    $group = $this->client->getGroup(Config::$GROUP_ID);

    if (!$user) {
      echo "error loading user {$user_id}\n";
      return;
    }

    if (!$group) {
      echo "error loading group {$group_id}\n";
      return;
    }

    $this->client->sendMessage(MessageCreator::getSubText($user, $group));
  }
}