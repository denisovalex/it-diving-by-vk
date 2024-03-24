<?php

namespace SubStalker;

use VK\CallbackApi\VKCallbackApiHandler;
use VK\Client\VKApiClient;

use SubStalker\Notifiers\AdminNotifier;

class CallbacksHandler extends VKCallbackApiHandler
{
  private VKApiClient $client;

  public function __construct(VKApiClient $client)
  {
    $this->client = $client;
  }

  public function groupLeave(int $group_id, ?string $secret, array $object)
  {
    $an = new AdminNotifier($this->client);
    $an->notifyLeave((int) $object['user_id'], $group_id);
  }

  public function groupJoin(int $group_id, ?string $secret, array $object)
  {
    $an = new AdminNotifier($this->client);
    $an->notifyJoin((int) $object['user_id'], $group_id);
  }
}