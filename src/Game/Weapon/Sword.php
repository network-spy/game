<?php

declare(strict_types=1);

namespace Game\Weapon;

use Game\AbstractWeapon;

/**
 * Class Sword
 * @package Game\Weapon
 */
class Sword extends AbstractWeapon
{
    private const NAME = 'Sword';

    /**
     * @return string
     */
    public static function getName(): string
    {
        return static::NAME;
    }
}
