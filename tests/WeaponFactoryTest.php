<?php

namespace Tests;

use Game\AbstractCharacter;
use Game\AbstractWeapon;
use Game\WeaponFactory;
use Game\Weapon\Axe;
use Game\Weapon\Bow;
use Game\Weapon\Knife;
use Game\Weapon\Sword;
use PHPUnit\Framework\TestCase;

/**
 * Class WeaponFactoryTest
 * @package Tests
 */
class WeaponFactoryTest extends TestCase
{
    /**
     * @var WeaponFactory
     */
    private $weaponFactory;

    /**
     *
     */
    protected function setUp()
    {
        parent::setUp();
        $this->weaponFactory = new WeaponFactory();

    }

    /**
     *
     */
    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     *
     */
    public function testCreateAxe()
    {
        $axe = $this->weaponFactory->createAxe();
        $this->assertInstanceOf(Axe::class, $axe, 'Wrong weapon type');
        $this->assertInstanceOf(AbstractWeapon::class, $axe, 'Wrong weapon type');
        $this->assertNotInstanceOf(Bow::class, $axe, 'Wrong weapon type');
        $this->assertNotInstanceOf(AbstractCharacter::class, $axe, 'Wrong weapon type');
    }

    /**
     *
     */
    public function testCreateBow()
    {
        $bow = $this->weaponFactory->createBow();
        $this->assertInstanceOf(Bow::class, $bow, 'Wrong weapon type');
        $this->assertInstanceOf(AbstractWeapon::class, $bow, 'Wrong weapon type');
        $this->assertNotInstanceOf(Axe::class, $bow, 'Wrong weapon type');
        $this->assertNotInstanceOf(AbstractCharacter::class, $bow, 'Wrong weapon type');
    }

    /**
     *
     */
    public function testCreateKnife()
    {
        $knife = $this->weaponFactory->createKnife();
        $this->assertInstanceOf(Knife::class, $knife, 'Wrong weapon type');
        $this->assertInstanceOf(AbstractWeapon::class, $knife, 'Wrong weapon type');
        $this->assertNotInstanceOf(Axe::class, $knife, 'Wrong weapon type');
        $this->assertNotInstanceOf(AbstractCharacter::class, $knife, 'Wrong weapon type');
    }

    /**
     *
     */
    public function testCreateSword()
    {
        $sword = $this->weaponFactory->createSword();
        $this->assertInstanceOf(Sword::class, $sword, 'Wrong weapon type');
        $this->assertInstanceOf(AbstractWeapon::class, $sword, 'Wrong weapon type');
        $this->assertNotInstanceOf(Axe::class, $sword, 'Wrong weapon type');
        $this->assertNotInstanceOf(AbstractCharacter::class, $sword, 'Wrong weapon type');
    }
}