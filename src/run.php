<?php

$composerAutoload = dirname(__DIR__) . '/vendor/autoload.php';

if (!file_exists($composerAutoload)) {
    echo "The 'vendor' folder is missing. You must run 'composer update' to resolve application dependencies.";
    die();
}
require $composerAutoload;


$observer = new Game\Notifier\DisplayMessageObserver();
$subject = new Game\Notifier\DisplayMessageSubject();
$subject->attach($observer);

$game = new Game\Game(
    new Game\WeaponFactory(),
    new Game\CharacterFactory(),
    $subject
);

$game->run();