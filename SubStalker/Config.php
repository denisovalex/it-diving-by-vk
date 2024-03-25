<?php

namespace SubStalker;

class Config
{
  static int $GROUP_ID; // айди сообщества
  static string $ACCESS_TOKEN; // токен сообщества (api ключ)
  static int $ADMIN_ID; // айди администратора-получателя
  static string $FORM_URL; // url формы для отзывов

  static function build(int $group_id, string $access_token, int $admin_id, string $form_url): void
  {
    self::$GROUP_ID = $group_id;
    self::$ACCESS_TOKEN = $access_token;
    self::$ADMIN_ID = $admin_id;
    self::$FORM_URL = $form_url;
  }
}