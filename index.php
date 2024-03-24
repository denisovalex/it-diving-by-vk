<?php

use SubStalker\SubStalker;
use SubStalker\Config;

require_once 'vendor/autoload.php';

main();

function main()
{
  $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
  $dotenv->load();
  try {
    $dotenv->required('GROUP_ID')->isInteger();
    $dotenv->required('ACCESS_TOKEN');
    $dotenv->required('RECEIVER_ID')->isInteger();
  } catch (Exception $e) {
    echo "Failed to find required variables in .env file. " .
      "Please make sure such file exists and contains variables:\n" .
      "GROUP_ID : integer\n" .
      "ACCESS_TOKEN : string\n" .
      "RECEIVER_ID : integer\n\n";
    return;
  }

  Config::build($_ENV['GROUP_ID'], $_ENV['ACCESS_TOKEN'], $_ENV['RECEIVER_ID']);

  $app = new SubStalker(Config::$GROUP_ID, Config::$ACCESS_TOKEN);
  $app->listen();
}