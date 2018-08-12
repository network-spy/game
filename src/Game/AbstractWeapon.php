<?php

declare(strict_types=1);

namespace Game;

/**
 * Class AbstractWeapon
 */
abstract class AbstractWeapon
{
    /**
     * @var int
     */
    protected $damage;

    /**
     * @var int
     */
    protected $maxFrequency;

    /**
     * AbstractWeapon constructor.
     * @param int $damage
     * @param int $maxFrequency
     */
    public function __construct(int $damage, int $maxFrequency)
    {
        $this->damage = $damage;
        $this->maxFrequency = $maxFrequency;
    }

    /**
     * @return string
     */
    abstract public static function getName(): string;

    /**
     * @param int $level
     * @param int $power
     * @return int
     */
    public function getDamageBySkills(int $level, int $power): int
    {
        if ($level <= $this->maxFrequency) {
            return rand($level, $this->maxFrequency) * $this->damage * $power;
        }

        return $this->maxFrequency * $this->damage * $power;
    }
}
