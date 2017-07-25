<?php

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
     */
    public function attach(SplObserver $observer)
    {
        $this->observers->attach($observer);
    }

    /**
     * @param SplObserver $observer
     */
    public function detach(SplObserver $observer)
    {
        $this->observers->detach($observer);
    }

    /**
     *
     */
    public function notify()
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
     */
    public function setMessage(string $message)
    {
        $this->message = $message;
    }
}