<?php

namespace Game\Weapon;

use Game\AbstractWeapon;

/**
 * Class Bow
 * @package Game\Weapon
 */
class Bow extends AbstractWeapon
{
    /**
     * Bow constructor.
     */
    public function __construct()
    {
        $this->name = 'Bow';
        $this->damage = 2;
        $this->maxFrequency = 2;
    }
}