<?php

declare(strict_types=1);

namespace Game\Notifier;

use \SplSubject;
use \SplObjectStorage;
use \SplObserver;

/**
 * Class DisplayMessageSubject
 * @package Game\Notifier
 */
class DisplayMessageSubject implements SplSubject
{
    /**
     * @var array
     */
    private $observers;

    /**
     * @var string
     */
    private $message;

    /**
     * DisplayMessageSubject constructor.
     */
    public function __construct()
    {
        $this->observers = new SplObjectStorage();
    }

    /**
     * @param SplObserver $observer
     * @return void
     */
    public function attach(SplObserver $observer): void
    {
        $this->observers->attach($observer);
    }

    /**
     * @param SplObserver $observer
     * @return void
     */
    public function detach(SplObserver $observer): void
    {
        $this->observers->detach($observer);
    }

    /**
     * @return void
     */
    public function notify(): void
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    /**
     * @return string
     */
    public function getMessage() : string
    {
        return $this->message;
    }

    /**
     * @param string $message
     * @return void
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }
}
