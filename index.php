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
    $dotenv->required('ADMIN_ID')->isInteger();
    $dotenv->required('FORM_URL');
  } catch (Exception $e) {
    echo "Failed to find required variables in .env file. " .
      "Please make sure such file exists and contains variables:\n" .
      "GROUP_ID : integer\n" .
      "ACCESS_TOKEN : string\n" .
      "ADMIN_ID : integer\n" .
      "FORM_URL : string\n\n";
    return;
  }

  Config::build($_ENV['GROUP_ID'], $_ENV['ACCESS_TOKEN'], $_ENV['ADMIN_ID'], $_ENV['FORM_URL']);

  $app = new SubStalker(Config::$GROUP_ID, Config::$ACCESS_TOKEN);
  $app->listen();
}