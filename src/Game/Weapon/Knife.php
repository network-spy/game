<?php

namespace Game\Weapon;

use Game\AbstractWeapon;

/**
 * Class Knife
 * @package Game\Weapon
 */
class Knife extends AbstractWeapon
{
    /**
     * Knife constructor.
     */
    public function __construct()
    {
        $this->name = 'Knife';
        $this->damage = 1;
        $this->maxFrequency = 4;
    }
}