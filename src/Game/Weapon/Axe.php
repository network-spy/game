<?php

namespace Game\Weapon;

use Game\AbstractWeapon;

/**
 * Class Axe
 * @package Game\Weapon
 */
class Axe extends AbstractWeapon
{
    /**
     * Axe constructor.
     */
    public function __construct()
    {
        $this->name = 'Axe';
        $this->damage = 4;
        $this->maxFrequency = 1;
    }
}