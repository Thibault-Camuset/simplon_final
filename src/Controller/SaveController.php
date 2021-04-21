<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\GameSave;
use Symfony\Component\HttpFoundation\Session\Session;

class SaveController extends AbstractController
{



    /**
     * @Route("/save", name="save_home")
     */
    public function indexAction(): Response
    {
        if($this->isGranted('IS_AUTHENTICATED_FULLY')) {
        return $this->render('game/saves/home.html.twig', [
            'controller_name' => 'SaveController',
        ]);
    } else {
        return $this->redirectToRoute('home_page');
    }
    }


    /**
     * @Route("/save/create", name="create_save")
     */
    public function createSaveAction(): Response
    {
        if($this->isGranted('IS_AUTHENTICATED_FULLY')) {
        return $this->render('game/saves/create-save.html.twig', [
            'controller_name' => 'SaveController',
        ]);
    } else {
        return $this->redirectToRoute('home_page');
    }
        
    }


    /**
     * @Route("/save/created", name="save_created")
     */
    public function saveCreatedAction(Request $request): Response
    {
        if($this->isGranted('IS_AUTHENTICATED_FULLY')) {
        $save = new GameSave();
        
            $save->setSaveName($request->get('save-name'));
            $save->setUser($this->getUser());
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($save);
            $entityManager->flush();

            return $this->redirectToRoute('save_home');
        } else {
            return $this->redirectToRoute('home_page');
        }

            
    
    }

    /**
     * @Route("/save/loaded/{id}", name="save_loaded")
     */
    public function saveLoadedAction(Request $request, GameSave $save, Session $session): Response
    {
        if($this->isGranted('IS_AUTHENTICATED_FULLY')) {
        $session->set('saved_game', $save);

        
        return $this->redirectToRoute('game_home');
            
    } else {
        return $this->redirectToRoute('home_page');
    }
    
    }


}
