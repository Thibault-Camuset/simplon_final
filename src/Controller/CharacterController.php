<?php

namespace App\Controller;

use App\Repository\GameSaveRepository;
use App\Repository\CharacterRepository;
use App\Repository\CharacterItemRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Character;
use App\Entity\Monster;
use App\Form\NewCharacterFormType;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Services\character\RetrieveEquipement;

class CharacterController extends AbstractController
{
    /**
     * @Route("/personnage/nouveau-personnage", name="new_character")
     */
    public function newCharacterAction(Request $request, Session $session, GameSaveRepository $gameSaveRepository): Response
    {
        if($this->isGranted('IS_AUTHENTICATED_FULLY')) {

        $character = new Character();
        $form = $this->createForm(NewCharacterFormType::class, $character);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $gamesave = $gameSaveRepository->find($session->get('saved_game')->getId());
            $character->setSave($gamesave);
            $character->setLevel(1);
            $character->setStrength(5);
            $character->setDexterity(5);
            $character->setConstitution(5);
            $character->setIntelligence(5);
            $character->setWisdom(5);
            $character->setCharisma(5);
            $character->setMaxHp(125);
            $character->setCurrentHp(125);
            $character->setBonusHp(0);
            $character->setActions(5);
            $character->setInQuest(false);
            $character->setExperience(0);
            $character->setCanLevelUp(false);
            $character->setSkillPoints(5);
            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->persist($character);
            $entityManager->flush();

            $session->set('saved_game', $gamesave);

            return $this->redirectToRoute('game_home');
        }


        return $this->render('game/character/new-character.html.twig', [
            'character' => $character,
            'form' => $form->createView(),
        ]);
    } else {
        return $this->redirectToRoute('home_page');
    }
    }

    /**
     * @Route("/personnage/fiche/{id}", name="character_details")
     */
    public function characterDetailsAction(RetrieveEquipement $retrieveEquipement, Session $session, Request $request, Character $character, CharacterItemRepository $characterItemRepository): Response
    {
        // Verification Utilisateur connecté a faire ici, sinon, redirection
        if($this->isGranted('IS_AUTHENTICATED_FULLY')) {
        $session->set('character', $character);

        if ($character->getWeaponRightSlot() != null) {
            $character->setBonusAttack($character->getWeaponRightSlot()->getAttack());
        } else {
            $character->setBonusAttack(0);
        }

        if ($character->getWeaponLeftSlot() != null) {
            $character->setBonusHp($character->getWeaponLeftSlot()->getHp());
        } else {
            $character->setBonusHp(0);
        }
        
        $inventory = $characterItemRepository->retrieveInventory($character->getSave());
        $equipement = $retrieveEquipement->retrieveEquipement($character);

        $character->setMaxHp(($character->getConstitution() * 5) + (($character->getLevel() - 1) * 50) + 100);
        if ($character->getCurrentHp() > ($character->getMaxHp() + $character->getBonusHp())) {
            $character->setCurrentHp($character->getMaxHp() + $character->getBonusHp());
        }
        if ($character->getCurrentHp() < 0 ) {
            $character->setCurrentHp(0);
        }

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($character);
        $entityManager->flush();

        return $this->render('game/character/character-details.html.twig', [
            'character' => $character,
            'inventory' => $inventory,
            'equipement' => $equipement,
        ]);
    } else {
        return $this->redirectToRoute('home_page');
    }
    }

    /**
     * @Route("/level-up/{id}", name="level_up")
     */
    public function characterLevelUpAction(Session $session, Request $request, Character $character): Response
    {
        if($this->isGranted('IS_AUTHENTICATED_FULLY')) {
        $character->setLevel($character->getLevel() + 1);
        $character->setExperience($character->getExperience() - 100);
        $character->setMaxHp($character->getmaxHp() + 50);
        $character->setSkillPoints($character->getSkillPoints() + 5);
        $character->setCanLevelUp(false);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($character);
        $entityManager->flush();

        $session->set('character', $character);

        return $this->redirectToRoute('character_details', [
            'id' => $character->getId(), 
            ]);
        } else {
            return $this->redirectToRoute('home_page');
        }
    }


    /**
     * @Route("/add-stats/{stat}", name="add_stats")
     */
    public function characterAddStatsAction(CharacterRepository $characterRepository, Session $session, Request $request, $stat): Response
    {
        if($this->isGranted('IS_AUTHENTICATED_FULLY')) {
        $character = $session->get('character');
        $character = $characterRepository->find($character->getId());

        switch ($stat) {
            case "strength":
                $character->setStrength($character->getStrength() + 1);
                $character->setSkillPoints($character->getSkillPoints() - 1);
                break;
            case "dexterity":
                $character->setDexterity($character->getDexterity() + 1);
                $character->setSkillPoints($character->getSkillPoints() - 1);
                break;
            case "constitution":
                $character->setConstitution($character->getConstitution() + 1);
                $character->setSkillPoints($character->getSkillPoints() - 1);
                break;
            case "intelligence":
                $character->setIntelligence($character->getIntelligence() + 1);
                $character->setSkillPoints($character->getSkillPoints() - 1);
                break;
            case "wisdom":
                $character->setWisdom($character->getWisdom() + 1);
                $character->setSkillPoints($character->getSkillPoints() - 1);
                break;
            case "charisma":
                $character->setCharisma($character->getCharisma() + 1);
                $character->setSkillPoints($character->getSkillPoints() - 1);
                break;
        }

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($character);
        $entityManager->flush();

        $session->set('character', $character);

        return $this->redirectToRoute('character_details', [
            'id' => $character->getId(), 
            'name' => $character->getName(), 
            ]);
        } else {
            return $this->redirectToRoute('home_page');
        }
    }




}
