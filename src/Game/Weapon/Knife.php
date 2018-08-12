<?php

declare(strict_types=1);

namespace Game\Weapon;

use Game\AbstractWeapon;

/**
 * Class Knife
 * @package Game\Weapon
 */
class Knife extends AbstractWeapon
{
    private const NAME = 'Knife';

    /**
     * @return string
     */
    public static function getName(): string
    {
        return static::NAME;
    }
}