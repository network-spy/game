<?php

namespace Game\Character;

use Game\AbstractCharacter;
use Game\AbstractWeapon;

/**
 * Class Troll
 * @package Game\Character
 */
class Troll extends AbstractCharacter
{
    /**
     * Troll constructor.
     * @param AbstractWeapon $weapon
     */
    public function __construct(AbstractWeapon $weapon)
    {
        $this->health = 55;
        $this->power = 4;
        $this->name = 'Troll';
        parent::__construct($weapon);
    }
}