<?php

declare(strict_types=1);

namespace Game\Character;

use Game\AbstractCharacter;

/**
 * Class Troll
 * @package Game\Character
 */
class Troll extends AbstractCharacter
{
    private const NAME = 'Troll';

    /**
     * @return string
     */
    public static function getName(): string
    {
        return static::NAME;
    }
}
