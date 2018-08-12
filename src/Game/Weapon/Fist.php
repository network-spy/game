<?php

declare(strict_types=1);

namespace Game\Weapon;

use Game\AbstractWeapon;

/**
 * Class Sword
 * @package Game\Weapon
 */
class None extends AbstractWeapon
{
    public const NAME = 'None';

    /**
     * @return string
     */
    public static function getName(): string
    {
        return static::NAME;
    }
}
