<?php

namespace SubStalker\Notifiers;

use VK\Client\VKApiClient;
use SubStalker\ClientUtility;

abstract class ANotifier
{
  protected ClientUtility $client;
  protected int $reciever_id;

  public function __construct(VKApiClient $client, int $reciever_id)
  {
    $this->client = new ClientUtility($client);
    $this->reciever_id = $reciever_id;
  }
}