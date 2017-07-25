<?php

namespace Game\Character;

use Game\AbstractCharacter;
use Game\AbstractWeapon;

/**
 * Class Gnome
 * @package Game\Character
 */
class Gnome extends AbstractCharacter
{
    /**
     * Gnome constructor.
     * @param AbstractWeapon $weapon
     */
    public function __construct(AbstractWeapon $weapon)
    {
        $this->health = 70;
        $this->power = 2;
        $this->name = 'Gnome';
        parent::__construct($weapon);
    }
}