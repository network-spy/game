<?php

declare(strict_types=1);

namespace Game;

use Game\Notifier\DisplayMessageSubject;
use Game\Weapon\Axe;
use Game\Weapon\Bow;
use Game\Weapon\Knife;
use Game\Weapon\Sword;
use Game\Weapon\Fist;
use Game\Character\Elf;
use Game\Character\Gnome;
use Game\Character\Knight;
use Game\Character\Troll;

/**
 * Class GameDemo
 * @package Game
 */
class GameDemo
{
    /**
     * @var WeaponFactory
     */
    private $weaponFactory;

    /**
     * @var CharacterFactory
     */
    private $characterFactory;

    /**
     * @var DisplayMessageSubject
     */
    private $notifier;

    /**
     * Game constructor.
     * @param WeaponFactory $weaponFactory
     * @param CharacterFactory $characterFactory
     * @param DisplayMessageSubject $notifier
     */
    public function __construct(
        WeaponFactory $weaponFactory,
        CharacterFactory $characterFactory,
        DisplayMessageSubject $notifier
    ) {
        $this->weaponFactory = $weaponFactory;
        $this->characterFactory = $characterFactory;
        $this->notifier = $notifier;
    }

    /**
     * Start point
     * @return void
     */
    public function run(): void
    {
        $weapons[] = $this->weaponFactory->create(Sword::getName());
        $weapons[] = $this->weaponFactory->create(Axe::getName());
        $weapons[] = $this->weaponFactory->create(Bow::getName());
        $weapons[] = $this->weaponFactory->create(Knife::getName());
        $weapons[] = $this->weaponFactory->create(Fist::getName());

        $weaponsCount = \count($weapons) - 1;

        $characters[] = $this->characterFactory->create(Gnome::getName(), $weapons[rand(0, $weaponsCount)]);
        $characters[] = $this->characterFactory->create(Elf::getName(), $weapons[rand(0, $weaponsCount)]);
        $characters[] = $this->characterFactory->create(Knight::getName(), $weapons[rand(0, $weaponsCount)]);
        $characters[] = $this->characterFactory->create(Troll::getName(), $weapons[rand(0, $weaponsCount)]);

        foreach ($characters as $character) {
            /**
             * @var AbstractCharacter $character
             */
            $this->notify(
                'Char ' . $character::getName() . ' got weapon ' . $character->getWeapon()::getName()
            );
        }

        $round = 1;
        do {
            $charactersCount = count($characters) - 1;
            $player1Index = rand(0, $charactersCount);
            $player2Index = $this->randWithExclusion(0, $charactersCount, $player1Index);
            $player1 = $characters[$player1Index];
            $player2 = $characters[$player2Index];
            $this->notify('---------------');
            $this->notify('Round ' . $round);
            $round++;
            if ($this->fight($player1, $player2)) {
                unset($characters[$player2Index]);
                $characters = array_values($characters);
                continue;
            }
            if ($this->fight($player2, $player1)) {
                unset($characters[$player1Index]);
                $characters = array_values($characters);
            }
        } while ($charactersCount > 1);

        /**
         * @var AbstractCharacter $winner
         */
        $winner = $characters[0];

        $this->notify("\n");
        $this->notify("\n***************");
        $this->notify(
            'Winner ' . $winner::getName() .
            ' with Weapon ' . $winner->getWeapon()::getName() .
            ' HP: ' . $winner->getHeals() .
            ' Level: ' . $winner->getLevel()
        );
        $this->notify("\n***************\n");
    }

    /**
     * @param AbstractCharacter $player1
     * @param AbstractCharacter $player2
     * @return bool
     */
    private function fight(AbstractCharacter $player1, AbstractCharacter $player2): bool
    {
        $this->notify($player1::getName() . ' attacking ' . $player2::getName());
        $player1->attack($player2);
        if ($player2->isDead()) {
            $this->notify('Char ' . $player1::getName() . ' killed enemy ' . $player2::getName());
            $isEnemyWeaponBetter = $player1->isDamageWithNewWeaponMore($player2->getWeapon());
            if ($isEnemyWeaponBetter) {
                $player1->setWeapon($player2->getWeapon());
                $this->notify(
                    'Char ' . $player1::getName() . ' picked up enemy\'s weapon ' . $player2->getWeapon()::getName()
                );
            }

            return true;
        }

        return false;
    }

    /**
     * @param $min
     * @param $max
     * @param $exclude
     * @return int
     */
    private function randWithExclusion($min, $max, $exclude): int
    {
        $value = rand($min, $max);

        return $value === $exclude ? $this->randWithExclusion($min, $max, $exclude) : $value;
    }

    /**
     * @param string $message
     * @return void
     */
    private function notify(string $message): void
    {
        $this->notifier->setMessage($message);
        $this->notifier->notify();
    }
}