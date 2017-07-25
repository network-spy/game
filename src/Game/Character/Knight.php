<?php

namespace Game\Character;

use Game\AbstractCharacter;
use Game\AbstractWeapon;

/**
 * Class Knight
 * @package Game\Character
 */
class Knight extends AbstractCharacter
{
    /**
     * Knight constructor.
     * @param AbstractWeapon $weapon
     */
    public function __construct(AbstractWeapon $weapon)
    {
        $this->health = 65;
        $this->power = 3;
        $this->name = 'Knight';
        parent::__construct($weapon);
    }
}