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

        $monsterAtk = 5;
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
            $recap = "$characterName a été battu!";
        } else {
            $recap = "$monsterName a été vaincu!";
        }

        $result['turn'] = $turn;
        $result['result'] = $recap;

        return $result;
    }

}