<?php

namespace Game;

use Game\AbstractWeapon;

/**
 * Class AbstractCharacter
 * @package Game
 */
abstract class AbstractCharacter
{
    /**
     * @var AbstractWeapon
     */
    protected $weapon;

    /**
     * @var int
     */
    protected $health;

    /**
     * @var int
     */
    protected $power;

    /**
     * @var int
     */
    protected $level;

    /**
     * @var string
     */
    protected $name;

    /**
     * Character constructor.
     * @param AbstractWeapon $weapon
     */
    public function __construct(AbstractWeapon $weapon)
    {
        $this->weapon = $weapon;
        $this->level = 1;
    }

    /**
     * @return AbstractWeapon
     */
    public function getWeapon() : AbstractWeapon
    {
        return $this->weapon;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @return int
     */
    public function getHeals()
    {
        return $this->health;
    }

    /**
     * @param AbstractCharacter $enemyCharacter
     */
    public function attack(AbstractCharacter $enemyCharacter)
    {
        $damage = $this->weapon->getDamageBySkills($this->level, $this->power);
        $enemyCharacter->attacked($damage);
        if ($enemyCharacter->isDead()) {
            $this->level++;
        }
    }

    /**
     * @param int $damage
     * @return int
     */
    public function attacked(int $damage)
    {
        $this->health -= $damage;

        return $this->health;
    }

    /**
     * @return bool
     */
    public function isDead()
    {
        return ($this->health <= 0);
    }

    /**
     * @param AbstractCharacter $enemyCharacter
     * @return bool
     */
    public function pickUpEnemyWeapon(AbstractCharacter $enemyCharacter)
    {
        $enemyWeaponDamage = $enemyCharacter->getWeapon()->getDamageBySkills($this->level, $this->power);
        $myWeaponDamage =  $this->weapon->getDamageBySkills($this->level, $this->power);
        if ($enemyWeaponDamage > $myWeaponDamage) {
            $this->weapon = $enemyCharacter->getWeapon();

            return true;
        }

        return false;
    }
}