<?php

namespace SubStalker;

class Config
{
  static int $GROUP_ID; // айди сообщества
  static string $ACCESS_TOKEN; // токен сообщества (api ключ)
  static int $RECEIVER_ID; // айди получателя сообщений

  static function build(int $group_id, string $access_token, int $receiver_id): void
  {
    self::$GROUP_ID = $group_id;
    self::$ACCESS_TOKEN = $access_token;
    self::$RECEIVER_ID = $receiver_id;
  }
}