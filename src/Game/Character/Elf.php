<?php

namespace Game\Character;

use Game\AbstractCharacter;
use Game\AbstractWeapon;

/**
 * Class Elf
 * @package Game\Character
 */
class Elf extends AbstractCharacter
{
    /**
     * Elf constructor.
     * @param AbstractWeapon $weapon
     */
    public function __construct(AbstractWeapon $weapon)
    {
        $this->health = 100;
        $this->power = 1;
        $this->name = 'Elf';
        parent::__construct($weapon);
    }
}