<?php

declare(strict_types=1);

namespace Game\Weapon;

use Game\AbstractWeapon;

/**
 * Class Axe
 * @package Game\Weapon
 */
class Axe extends AbstractWeapon
{
    private const NAME = 'Axe';

    /**
     * @return string
     */
    public static function getName(): string
    {
        return static::NAME;
    }
}