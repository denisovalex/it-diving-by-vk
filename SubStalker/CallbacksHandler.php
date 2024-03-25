<?php

namespace SubStalker;

use VK\CallbackApi\VKCallbackApiHandler;
use VK\Client\VKApiClient;

use SubStalker\Notifiers\AdminNotifier;
use SubStalker\Notifiers\UnsubscriberNotifier;

class CallbacksHandler extends VKCallbackApiHandler
{
  private VKApiClient $client;

  public function __construct(VKApiClient $client)
  {
    $this->client = $client;
  }

  public function groupLeave(int $group_id, ?string $secret, array $object)
  {
    $an = new AdminNotifier($this->client, Config::$ADMIN_ID);
    $an->notifyLeave((int) $object['user_id'], $group_id);

    $un = new UnsubscriberNotifier($this->client, (int) $object['user_id']);
    $un->notify(Config::$FORM_URL);
  }

  public function groupJoin(int $group_id, ?string $secret, array $object)
  {
    $an = new AdminNotifier($this->client, Config::$ADMIN_ID);
    $an->notifyJoin((int) $object['user_id'], $group_id);
  }
}