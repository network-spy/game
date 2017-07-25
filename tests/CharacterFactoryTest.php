<?php

namespace Tests;

use Game\AbstractWeapon;
use Game\AbstractCharacter;
use Game\CharacterFactory;
use Game\WeaponFactory;
use Game\Character\Troll;
use Game\Character\Elf;
use Game\Character\Knight;
use Game\Character\Gnome;
use PHPUnit\Framework\TestCase;

/**
 * Class CharacterFactoryTest
 * @package Tests
 */
class CharacterFactoryTest extends TestCase
{
    /**
     * @var CharacterFactory
     */
    private $characterFactory;

    /**
     *
     */
    protected function setUp()
    {
        parent::setUp();
        $this->characterFactory = new CharacterFactory();
    }

    /**
     *
     */
    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @return array
     */
    public function weaponProvider()
    {
        $weaponFactory = new WeaponFactory();

        return [
            [$weaponFactory->createAxe()],
            [$weaponFactory->createBow()],
            [$weaponFactory->createKnife()],
            [$weaponFactory->createSword()]
        ];
    }

    /**
     * @dataProvider weaponProvider
     */
    public function testCreatingElf(AbstractWeapon $weapon)
    {
        $elf = $this->characterFactory->createElf($weapon);
        $this->assertInstanceOf(Elf::class, $elf, 'Wrong character type');
        $this->assertInstanceOf(AbstractCharacter::class, $elf, 'Wrong character type');
        $this->assertInstanceOf(get_class($weapon), $weapon, 'Character has wrong weapon');
    }

    /**
     * @dataProvider weaponProvider
     */
    public function testCreatingGnome(AbstractWeapon $weapon)
    {
        $gnome = $this->characterFactory->createGnome($weapon);
        $this->assertInstanceOf(Gnome::class, $gnome, 'Wrong character type');
        $this->assertInstanceOf(AbstractCharacter::class, $gnome, 'Wrong character type');
        $this->assertInstanceOf(get_class($gnome->getWeapon()), $weapon, 'Character has wrong weapon');
    }

    /**
     * @dataProvider weaponProvider
     */
    public function testCreatingKnight(AbstractWeapon $weapon)
    {
        $knight = $this->characterFactory->createKnight($weapon);
        $this->assertInstanceOf(Knight::class, $knight, 'Wrong character type');
        $this->assertInstanceOf(AbstractCharacter::class, $knight, 'Wrong character type');
        $this->assertInstanceOf(get_class($knight->getWeapon()), $weapon, 'Character has wrong weapon');
    }

    /**
     * @dataProvider weaponProvider
     */
    public function testCreatingTroll(AbstractWeapon $weapon)
    {
        $troll = $this->characterFactory->createTroll($weapon);
        $this->assertInstanceOf(Troll::class, $troll, 'Wrong character type');
        $this->assertInstanceOf(AbstractCharacter::class, $troll, 'Wrong character type');
        $this->assertInstanceOf(get_class($troll->getWeapon()), $weapon, 'Character has wrong weapon');
    }
}