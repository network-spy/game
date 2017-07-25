<?php

namespace Game\Weapon;

use Game\AbstractWeapon;

/**
 * Class Sword
 * @package Game\Weapon
 */
class Sword extends AbstractWeapon
{
    /**
     * Sword constructor.
     */
    public function __construct()
    {
        $this->name = 'Sword';
        $this->damage = 3;
        $this->maxFrequency = 2;
    }
}