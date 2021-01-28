<?php

namespace App\Services\game;

use App\Entity\Character;
use App\Entity\Monster;

class MonsterFight
{

    public function fight(Character $character, Monster $monster)
    {

        $characterAtk = 10;
        $characterHp = $character->getMaxHp();
        $characterName = $character->getName();

        if ($monster->getName() == 'Poney Andalou') {
            $monsterAtk = 25;
        } else if ($monster->getName() == 'Goblin') {
            $monsterAtk = 5;
        } else if ($monster->getName() == 'Chaise') {
            $monsterAtk = 1;
        }

        $monsterHp = $monster->getMaxHp();
        $monsterName = $monster->getName();

        $turn = [];

        while ( $characterHp > 0 && $monsterHp > 0) {
            $monsterHp -= $characterAtk;
            $turn[] = [
                'recap' => "$characterName Attaque pour $characterAtk dommages", 
                'monsterhp' => $monsterHp
            ];
            if ($monsterHp <= 0) {
                break;
            }
            $characterHp -= $monsterAtk;
            $turn[] = [
                'recap' => "$monsterName Attaque pour $monsterAtk dommages", 
                'characterhp' => $characterHp
            ];
        }

        if ($characterHp <= 0) {
            $recap['message'] = "$characterName a été vaincu(e)!";
        } else {
            $recap['message'] = "$monsterName a été vaincu(e)!";
            $recap['xp'] = 1;
        }

        $result['turn'] = $turn;
        $result['recap'] = $recap;


        return $result;
    }

}