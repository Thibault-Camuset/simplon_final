<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;

class GameController extends AbstractController
{
    /**
     * @Route("/game", name="game_home")
     */
    public function indexAction(Session $session): Response
    {
        return $this->render('game/home.html.twig', [
            'save' => $session->get('saved_game'),
        ]);
    }

}
