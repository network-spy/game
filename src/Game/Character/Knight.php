<?php

declare(strict_types=1);

namespace Game\Character;

use Game\AbstractCharacter;

/**
 * Class Knight
 * @package Game\Character
 */
class Knight extends AbstractCharacter
{
    private const NAME = 'Knight';

    /**
     * @return string
     */
    public static function getName(): string
    {
        return static::NAME;
    }
}
