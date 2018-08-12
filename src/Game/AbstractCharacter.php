<?php

declare(strict_types=1);

namespace Game;

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
     * @return string
     */
    abstract public static function getName(): string;

    /**
     * AbstractCharacter constructor.
     * @param int $health
     * @param int $power
     * @param AbstractWeapon $weapon
     */
    public function __construct(int $health, int $power, AbstractWeapon $weapon)
    {
        $this->level = 1;
        $this->health = $health;
        $this->power = $power;
        $this->name = static::getName();
        $this->setWeapon($weapon);
    }

    /**
     * @return AbstractWeapon
     */
    public function getWeapon(): AbstractWeapon
    {
        return $this->weapon;
    }

    /**
     * @param AbstractWeapon $weapon
     * @return void
     */
    public function setWeapon(AbstractWeapon $weapon): void
    {
        $this->weapon = $weapon;
    }

    /**
     * @return int
     */
    public function getLevel(): int
    {
        return $this->level;
    }

    /**
     * @return int
     */
    public function getHeals(): int
    {
        return $this->health;
    }

    /**
     * @param AbstractCharacter $enemyCharacter
     */
    public function attack(AbstractCharacter $enemyCharacter): void
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
    public function attacked(int $damage): int
    {
        $this->health -= $damage;

        return $this->health;
    }

    /**
     * @return bool
     */
    public function isDead(): bool
    {
        return $this->health <= 0;
    }

    /**
     * @param AbstractWeapon $weapon
     * @return bool
     */
    public function isDamageWithNewWeaponMore(AbstractWeapon $weapon): bool
    {
        $newWeaponDamage = $weapon->getDamageBySkills($this->level, $this->power);
        $currentWeaponDamage =  $this->getWeapon()->getDamageBySkills($this->level, $this->power);

        return $newWeaponDamage > $currentWeaponDamage;
    }
}
