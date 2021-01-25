<?php

namespace App\Controller;

use App\Repository\GameSaveRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Character;
use App\Form\NewCharacterFormType;
use Symfony\Component\HttpFoundation\Session\Session;

class CharacterController extends AbstractController
{
    /**
     * @Route("/character/new-character", name="new_character")
     */
    public function newCharacterAction(Request $request, Session $session, GameSaveRepository $gameSaveRepository): Response
    {
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
            $character->setMaxHp(100);
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
    }

     /**
     * @Route("/character/{name}/{id}", name="character_details")
     */
    public function characterDetailsAction(Session $session, Request $request, Character $character): Response
    {
        $session->set('character', $character);

        return $this->render('game/character/character-details.html.twig', [
            'character' => $character,
        ]);
    }

}
