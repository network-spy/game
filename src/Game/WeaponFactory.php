<?php

declare(strict_types=1);

namespace Game;

use Game\Weapon\Axe;
use Game\Weapon\Bow;
use Game\Weapon\Knife;
use Game\Weapon\Sword;
use Game\Weapon\Fist;

/**
 * Class WeaponFactory
 * @package Game
 */
class WeaponFactory
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
     * @param string $type
     * @return AbstractWeapon
     * @throws \Exception
     */
    public function create(string $type = ''): AbstractWeapon
    {
        switch ($type) {
            case Axe::getName():
                return $this->createAxe();
            case Bow::getName():
                return $this->createBow();
            case Knife::getName():
                return $this->createKnife();
            case Sword::getName():
                return $this->createSword();
            default:
                return $this->createFist();
        }
    }

    /**
     * @return Axe
     */
    private function createAxe() : Axe
    {
        $axeConfig = $this->config[Axe::getName()];

        return new Axe(
            $axeConfig['damage'],
            $axeConfig['max_frequency']
        );
    }

    /**
     * @return Bow
     */
    private function createBow() : Bow
    {
        $bowConfig = $this->config[Bow::getName()];

        return new Bow(
            $bowConfig['damage'],
            $bowConfig['max_frequency']
        );
    }

    /**
     * @return Knife
     */
    private function createKnife() : Knife
    {
        $knifeConfig = $this->config[Knife::getName()];

        return new Knife(
            $knifeConfig['damage'],
            $knifeConfig['max_frequency']
        );
    }

    /**
     * @return Sword
     */
    private function createSword() : Sword
    {
        $swordConfig = $this->config[Sword::getName()];

        return new Sword(
            $swordConfig['damage'],
            $swordConfig['max_frequency']
        );
    }

    /**
     * @return Fist
     */
    private function createFist() : Fist
    {
        $fistConfig = $this->config[Fist::getName()];

        return new Fist(
            $fistConfig['damage'],
            $fistConfig['max_frequency']
        );
    }
}
