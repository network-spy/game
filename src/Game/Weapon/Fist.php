<?php

declare(strict_types=1);

namespace Game\Weapon;

use Game\AbstractWeapon;

/**
 * Class Fist
 * @package Game\Weapon
 */
class Fist extends AbstractWeapon
{
    private const NAME = 'Fist';

    /**
     * @return string
     */
    public static function getName(): string
    {
        return static::NAME;
    }
}
