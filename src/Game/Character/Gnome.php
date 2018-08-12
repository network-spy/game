<?php

declare(strict_types=1);

namespace Game\Character;

use Game\AbstractCharacter;

/**
 * Class Gnome
 * @package Game\Character
 */
class Gnome extends AbstractCharacter
{
    private const NAME = 'Gnome';

    /**
     * @return string
     */
    public static function getName(): string
    {
        return static::NAME;
    }
}
