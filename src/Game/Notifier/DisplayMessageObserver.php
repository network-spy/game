<?php

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
     */
    public function update(SplSubject $subject)
    {
        echo "\n";
        echo $subject->getMessage();
    }
}