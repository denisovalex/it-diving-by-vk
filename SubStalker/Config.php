<?php

namespace SubStalker;

class Config
{
  static int $GROUP_ID; // айди сообщества
  static string $ACCESS_TOKEN; // токен сообщества (api ключ)
  static int $RECEIVER_ID; // айди получателя сообщений

  static function build(string $group_id, string $access_token, string $receiver_id): void
  {
    self::$GROUP_ID = (int) $group_id;
    self::$ACCESS_TOKEN = $access_token;
    self::$RECEIVER_ID = (int) $receiver_id;
  }
}