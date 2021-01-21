<?php

namespace App\Controller;

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
    public function newCharacterAction(Request $request, Session $session): Response
    {
        $character = new Character();
        $form = $this->createForm(NewCharacterFormType::class, $character);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $character->setSave($session->get('saved_game'));
            $character->setStrength(5);
            $character->setDexterity(5);
            $character->setConstitution(5);
            $character->setIntelligence(5);
            $character->setWisdom(5);
            $character->setCharisma(5);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($character);
            $entityManager->flush();
        }


        return $this->render('game/character/new-character.html.twig', [
            'character' => $character,
            'form' => $form->createView(),
        ]);
    }
}
