<?php

$composerAutoload = dirname(__DIR__) . '/vendor/autoload.php';

if (!file_exists($composerAutoload)) {
    echo "The 'vendor' folder is missing. You must run 'composer update' to resolve application dependencies.";
    die();
}
require $composerAutoload;

$settings = require 'Game/settings.php';
$config = new \Game\Config($settings);

$subject = new Game\Notifier\DisplayMessageSubject();

if ($config->get('log.display')) {
    $observer = new Game\Notifier\DisplayMessageObserver();
    $subject->attach($observer);
}


$game = new Game\GameDemo(
    new Game\WeaponFactory($config->get('weapons')),
    new Game\CharacterFactory($config->get('characters')),
    $subject
);

$game->run();
