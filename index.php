<?php

use SubStalker\SubStalker;
use SubStalker\Config;

require_once 'vendor/autoload.php';

main();

function main()
{
  $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
  $dotenv->safeLoad();

  Config::build($_ENV['GROUP_ID'], $_ENV['ACCESS_TOKEN'], $_ENV['RECEIVER_ID']);

  $app = new SubStalker(Config::$GROUP_ID, Config::$ACCESS_TOKEN);
  $app->listen();
}