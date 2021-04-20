<?php

namespace App\Controller;

use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\CharacterRepository;
use App\Entity\Character;
use App\Entity\Monster;
use App\Entity\Quest;
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
        $character->setCurrentHp($result['hp']);
        if ($result['recap']['xp'] > 0) {
            $character->setExperience($character->getExperience() + $result['recap']['xp']);
        }
        
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($character);
        $entityManager->flush();

        return $this->render('game/monster/fight.html.twig', [
            'character' => $character,
            'monster' => $monster,
            'result' => $result,
        ]);
    }







    /**
     * @Route("/quest-list/", name="quest_list")
     */
    public function questAction(CharacterRepository $characterRepository, Session $session): Response
    {
        
        $character = $session->get('character');

        return $this->render('game/quest/quest-list.html.twig', [
            'character' => $character,
        ]);
    }

    /**
     * @Route("/quest-attempt/{id}", name="quest_attempt")
     */
    public function questAttemptAction(CharacterRepository $characterRepository, Session $session, Quest $quest): Response
    {
        $character = $session->get('character');
        $character = $characterRepository->find($character->getId());

        
        if ($character->getQuestStartedAt() == null) {
            $character->setQuestStartedAt(new DateTime());
            $current = new DateTime('now');
            $date = clone $character->getQuestStartedAt();
            $character->setQuestEndingAt($date->modify('+' . $quest->getLength() . 'minutes'));
            $character->setQuest($quest);


            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($character);
            $entityManager->flush();
        }

        $current = new DateTime('now');
        $total = clone $character->getQuestStartedAt()->diff(clone $character->getQuestEndingAt());
        $actual = clone $character->getQuestStartedAt()->diff($current);
        if ($actual->h > $total->h || $actual->d > $total->d || $actual->m > $total->m) {
            $remain = 0;
            $progress = 100;
        } else {
            $progress = ($actual->i / $total->i) * 100;
            $remain = $total->i - $actual->i;
            if ($remain <= 0) {
                $remain = 0;
            }
        }


        return $this->render('game/quest/quest-current.html.twig', [
            'character' => $character,
            'quest' => $quest,
            'current' => $current,
            'progress' => $progress,
            'remain' => $remain,
        
        ]);
    }

    /**
     * @Route("/quest-reward/", name="quest_reward")
     */
    public function questRewardAction(CharacterRepository $characterRepository, Session $session): Response
    {
        $character = $session->get('character');
        $character = $characterRepository->find($character->getId());
        $quest = $character->getQuest();

        $character->setQuestStartedAt(null);
        $character->setQuestEndingAt(null);
        $character->setExperience($character->getExperience() + $quest->getExperience());

        // Verification si 100 d'exp pour levelup?
        if ($character->getExperience() >= 100) {
            $character->setCanLevelup(true);
        }

        $character->setQuest(null);
        

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($character);
        $entityManager->flush();
        

        return $this->render('game/quest/quest-reward.html.twig', [
            'character' => $character,
            'quest' => $quest,
        ]);
    }

}
