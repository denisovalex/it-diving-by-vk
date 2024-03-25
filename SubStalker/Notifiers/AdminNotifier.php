<?php

namespace SubStalker\Notifiers;

use VK\Client\VKApiClient;

use SubStalker\Entities\Subscriber;
use SubStalker\Entities\Group;
use SubStalker\Entities\AUser;

use SubStalker\Config;

class AdminNotifier extends ANotifier
{
  private const NOTIFICATION_TYPE_JOIN = 'join';
  private const NOTIFICATION_TYPE_LEAVE = 'leave';
  private int $receiver_id;

  public function __construct(VKApiClient $client)
  {
    parent::__construct($client);
    $this->receiver_id = Config::$RECEIVER_ID;
  }

  public function notifyJoin(int $user_id, int $group_id)
  {
    $this->notify(self::NOTIFICATION_TYPE_JOIN, $user_id, $group_id);
  }

  public function notifyLeave(int $user_id, int $group_id)
  {
    $this->notify(self::NOTIFICATION_TYPE_LEAVE, $user_id, $group_id);
  }

  private function notify(string $type, int $user_id, int $group_id)
  {
    $user_response = $this->client->getUser($user_id);
    if (!$user_response) {
      echo "error loading user {$user_id}\n";
      return;
    }
    $user = new Subscriber(
      $user_id,
      $user_response['first_name'] . ' ' . $user_response['last_name'],
      (int) $user_response['sex']
    );


    $group_response = $this->client->getGroup($group_id);
    if (!$group_response) {
      echo "error loading group {$group_id}\n";
      return;
    }
    $group = new Group($group_id, $group_response['name']);

    $text = self::buildText($type, $user, $group);

    $this->client->sendMessage($text, $this->receiver_id);
  }

  private function buildText(string $type, Subscriber $user, Group $group)
  {
    $user_mention = self::buildMention($user);
    $group_mention = self::buildMention($group);

    switch ($type) {
      case self::NOTIFICATION_TYPE_JOIN:
        $action = $user->isFemale() ? "подписалась" : ($user->isMale() ? "подписался" : "подписался(-лась)");
        return "{$user_mention} {$action} на сообщество {$group_mention}";
      case self::NOTIFICATION_TYPE_LEAVE:
        $action = $user->isFemale() ? "отписалась" : ($user->isMale() ? "отписался" : "отписался(-лась)");
        return "{$user_mention} {$action} от сообщества {$group_mention}";
      default:
        return "Unknown type of notification: {$type}";
    }
  }

  private function buildMention(AUser $user)
  {
    $prefix = ($user instanceof Group) ? 'club' : 'id';
    return "[{$prefix}{$user->getId()}|{$user->getName()}]";
  }
}