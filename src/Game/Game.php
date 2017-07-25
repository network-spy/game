<?php

namespace Game;

use Game\Notifier\DisplayMessageSubject;
use Game\AbstractCharacter;

/**
 * Class Game
 * @package Game
 */
class Game
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
     */
    public function run()
    {
        $weapons[] =  $this->weaponFactory->createSword();
        $weapons[] = $this->weaponFactory->createAxe();
        $weapons[] = $this->weaponFactory->createBow();
        $weapons[] = $this->weaponFactory->createKnife();

        $weaponsCount = count($weapons) - 1;

        $characters[] = $this->characterFactory->createGnome($weapons[rand(0, $weaponsCount)]);
        $characters[] = $this->characterFactory->createElf($weapons[rand(0, $weaponsCount)]);
        $characters[] = $this->characterFactory->createKnight($weapons[rand(0, $weaponsCount)]);
        $characters[] = $this->characterFactory->createTroll($weapons[rand(0, $weaponsCount)]);

        foreach ($characters as $character) {
            $this->notify(
                'Char ' . $character->getName() . ' got weapon ' . $character->getWeapon()->getName()
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

        $winner = $characters[0];

        $this->notify("\n");
        $this->notify("\n***************");
        $this->notify(
            'Winner ' . $winner->getName() . ' HP: ' . $winner->getHeals() . ' Level: ' . $winner->getLevel()
        );
        $this->notify("\n***************\n");
    }

    /**
     * @param AbstractCharacter $player1
     * @param AbstractCharacter $player2
     * @return bool
     */
    private function fight(AbstractCharacter $player1, AbstractCharacter $player2)
    {
        $this->notify($player1->getName() . ' attacking ' . $player2->getName());
        $player1->attack($player2);
        if ($player2->isDead()) {
            $this->notify('Char ' . $player1->getName() . ' killed enemy ' . $player2->getName());
            if ($player1->pickUpEnemyWeapon($player2)) {
                $this->notify(
                    'Char ' . $player1->getName() . ' picked up enemy\'s weapon ' . $player2->getWeapon()->getName()
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
    private function randWithExclusion($min, $max, $exclude)
    {
        $value = rand($min, $max);

        return ($value === $exclude) ? $this->randWithExclusion($min, $max, $exclude) : $value;
    }

    /**
     * @param string $message
     */
    private function notify(string $message)
    {
        $this->notifier->setMessage($message);
        $this->notifier->notify();
    }
}