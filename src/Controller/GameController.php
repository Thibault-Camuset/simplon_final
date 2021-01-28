<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\CharacterRepository;
use App\Entity\Character;
use App\Entity\Monster;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Repository\MonsterRepository;
use App\Services\game\MonsterFight;

class GameController extends AbstractController
{
    /**
     * @Route("/game", name="game_home")
     */
    public function indexAction(CharacterRepository $characterRepository, Session $session): Response
    {
        if ($session->get('saved_game')) {
            $characters = $characterRepository->findBy(['save' => $session->get('saved_game')->getId()]);
        } else {
            $characters = '';
        }

        return $this->render('game/home.html.twig', [
            'save' => $session->get('saved_game'),
            'characters' => $characters,
        ]);
    }

    /**
     * @Route("/monster-list/", name="monster_fight_list")
     */
    public function monsterListAction(CharacterRepository $characterRepository, Session $session): Response
    {
        
        $character = $session->get('character');

        return $this->render('game/monster/monster-list.html.twig', [
            'character' => $character,
        ]);
    }


    /**
     * @Route("/monster-fight/{id}", name="monster_fight")
     */
    public function monsterFightAction(CharacterRepository $characterRepository, MonsterFight $monsterFight, Session $session, Monster $monster): Response
    {
        $character = $session->get('character');
        $character = $characterRepository->find($character->getId());

        $result = $monsterFight->fight($character, $monster);
        
        $character->setActions($character->getActions() - 1);
        
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($character);
        $entityManager->flush();

        return $this->render('game/monster/fight.html.twig', [
            'character' => $character,
            'monster' => $monster,
            'result' => $result,
        ]);
    }

}
