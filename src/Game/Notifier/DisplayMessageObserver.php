<?php

declare(strict_types=1);

namespace Game\Notifier;

use \SplObserver;
use \SplSubject;

/**
 * Class DisplayMessageObserver
 * @package Game\Notifier
 */
class DisplayMessageObserver implements SplObserver
{
    /**
     * @param SplSubject $subject
     * @return void
     */
    public function update(SplSubject $subject): void
    {
        echo "\n";
        echo $subject->getMessage();
    }
}