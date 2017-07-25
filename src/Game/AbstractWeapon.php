<?php

namespace Game;

/**
 * Class AbstractWeapon
 */
abstract class AbstractWeapon
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var int
     */
    protected $damage;

    /**
     * @var int
     */
    protected $maxFrequency;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param int $level
     * @param int $power
     * @return int
     */
    public function getDamageBySkills(int $level, int $power)
    {
        if ($level <= $this->maxFrequency) {
            return rand($level, $this->maxFrequency) * $this->damage * $power;
        }

        return $this->maxFrequency * $this->damage * $power;
    }
}