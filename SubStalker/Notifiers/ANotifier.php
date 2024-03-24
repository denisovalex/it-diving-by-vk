<?php

namespace SubStalker\Notifiers;

use VK\Client\VKApiClient;
use SubStalker\ClientUtility;

abstract class ANotifier
{
  protected ClientUtility $client;

  public function __construct(VKApiClient $client)
  {
    $this->client = new ClientUtility($client);
  }
}