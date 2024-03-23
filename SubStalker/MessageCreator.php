<?php

namespace SubStalker;

class MessageCreator
{
  public static function getUnsubText(mixed $user, mixed $group): string
  {
    return '[id' . self::getUserID($user) . '|' . self::getUserName($user) . '] ' .
      self::getLeave($user) . ' сообщество [club' . self::getGroupID($group) . '|' . self::getGroupName($group) . ']';
  }

  public static function getSubText(mixed $user, mixed $group): string
  {
    return '[id' . self::getUserID($user) . '|' . self::getUserName($user) . '] ' .
      self::getSubscribe($user) . ' сообщество [club' . self::getGroupID($group) . '|' . self::getGroupName($group) . ']';
  }

  private static function getUserID(mixed $user): string
  {
    return $user['id'];
  }

  private static function getUserName(mixed $user): string
  {
    return $user['first_name'] . ' ' . $user['last_name'];
  }

  private static function getLeave(mixed $user): string
  {
    switch ($user['sex']) {
      case 1:
        return 'покинула';
      case 2:
        return 'покинул';
      default:
        return 'покинул(-а)';
    }
  }

  private static function getSubscribe(mixed $user): string
  {
    switch ($user['sex']) {
      case 1:
        return 'подписалась на';
      case 2:
        return 'подписался на';
      default:
        return 'подписался(-лась) на';
    }
  }

  private static function getGroupID(mixed $group): string
  {
    return $group['id'];
  }

  private static function getGroupName(mixed $group): string
  {
    return $group['name'];
  }
}