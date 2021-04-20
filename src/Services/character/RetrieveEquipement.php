<?php

namespace App\Services\character;

use App\Entity\Character;


class RetrieveEquipement
{

    public function retrieveEquipement(Character $character) {

        $equipement = [];

        if ($character->getWeaponRightSlot() != null) {
            $equipement = $character->getWeaponRightSlot(); 
        }

        if ($character->getWeaponLeftSlot() != null) {
            $equipement = $character->getWeaponLeftSlot(); 
        }

        return $equipement; 
    }


}
