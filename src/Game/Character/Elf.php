<?php

declare(strict_types=1);

namespace Game\Character;

use Game\AbstractCharacter;

/**
 * Class Elf
 * @package Game\Character
 */
class Elf extends AbstractCharacter
{
    private const NAME = 'Elf';

    /**
     * @return string
     */
    public static function getName(): string
    {
        return static::NAME;
    }
}
