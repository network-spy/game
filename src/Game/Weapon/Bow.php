<?php

declare(strict_types=1);

namespace Game\Weapon;

use Game\AbstractWeapon;

/**
 * Class Bow
 * @package Game\Weapon
 */
class Bow extends AbstractWeapon
{
    private const NAME = 'Bow';

    /**
     * @return string
     */
    public static function getName(): string
    {
        return static::NAME;
    }
}