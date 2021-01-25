<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\CharacterRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;

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

}
