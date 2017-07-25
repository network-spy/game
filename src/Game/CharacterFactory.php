<?php

namespace Game;

use Game\AbstractWeapon;
use Game\Character\Gnome;
use Game\Character\Knight;
use Game\Character\Elf;
use Game\Character\Troll;

/**
 * Class CharacterFactory
 * @package Game
 */
class CharacterFactory
{
    /**
     * @param AbstractWeapon $weapon
     * @return Elf
     */
    public function createElf(AbstractWeapon $weapon) : Elf
    {
        return new Elf($weapon);
    }

    /**
     * @param AbstractWeapon $weapon
     * @return Gnome
     */
    public function createGnome(AbstractWeapon $weapon) : Gnome
    {
        return new Gnome($weapon);
    }

    /**
     * @param AbstractWeapon $weapon
     * @return Knight
     */
    public function createKnight(AbstractWeapon $weapon) : Knight
    {
        return new Knight($weapon);
    }

    /**
     * @param AbstractWeapon $weapon
     * @return Troll
     */
    public function createTroll(AbstractWeapon $weapon) : Troll
    {
        return new Troll($weapon);
    }
}