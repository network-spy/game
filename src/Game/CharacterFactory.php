<?php

declare(strict_types=1);

namespace Game;

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
     * @var array
     */
    private $config;

    /**
     * CharacterFactory constructor.
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = $config;
    }

    /**
     * @param string $character
     * @param \Game\AbstractWeapon $weapon
     * @return AbstractCharacter
     * @throws \Exception
     */
    public function create(string $character, AbstractWeapon $weapon): AbstractCharacter
    {
        switch ($character) {
            case Elf::getName():
                return $this->createElf($weapon);
            case Gnome::getName():
                return $this->createGnome($weapon);
            case Knight::getName():
                return $this->createKnight($weapon);
            case Troll::getName():
                return $this->createTroll($weapon);
            default:
                throw new \Exception('Unknown character');
        }
    }

    /**
     * @param AbstractWeapon $weapon
     * @return Elf
     */
    private function createElf(AbstractWeapon $weapon) : Elf
    {
        $elfConfig = $this->config[Elf::getName()];

        return new Elf(
            $elfConfig['health'],
            $elfConfig['power'],
            $weapon
        );
    }

    /**
     * @param AbstractWeapon $weapon
     * @return Gnome
     */
    private function createGnome(AbstractWeapon $weapon) : Gnome
    {
        $gnomeConfig = $this->config[Gnome::getName()];

        return new Gnome(
            $gnomeConfig['health'],
            $gnomeConfig['power'],
            $weapon
        );
    }

    /**
     * @param AbstractWeapon $weapon
     * @return Knight
     */
    private function createKnight(AbstractWeapon $weapon) : Knight
    {
        $knightConfig = $this->config[Knight::getName()];

        return new Knight(
            $knightConfig['health'],
            $knightConfig['power'],
            $weapon
        );
    }

    /**
     * @param AbstractWeapon $weapon
     * @return Troll
     */
    private function createTroll(AbstractWeapon $weapon) : Troll
    {
        $trollConfig = $this->config[Troll::getName()];

        return new Troll(
            $trollConfig['health'],
            $trollConfig['power'],
            $weapon
        );
    }
}
