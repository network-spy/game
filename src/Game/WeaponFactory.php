<?php

namespace Game;

use Game\Weapon\Axe;
use Game\Weapon\Bow;
use Game\Weapon\Knife;
use Game\Weapon\Sword;

/**
 * Class WeaponFactory
 * @package Game
 */
class WeaponFactory
{
    /**
     * @return Axe
     */
    public function createAxe() : Axe
    {
        return new Axe();
    }

    /**
     * @return Bow
     */
    public function createBow() : Bow
    {
        return new Bow();
    }

    /**
     * @return Knife
     */
    public function createKnife() : Knife
    {
        return new Knife();
    }

    /**
     * @return Sword
     */
    public function createSword() : Sword
    {
        return new Sword();
    }
}