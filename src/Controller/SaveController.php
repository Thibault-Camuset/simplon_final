<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\GameSave;

class SaveController extends AbstractController
{
    /**
     * @Route("/save/create", name="create_save")
     */
    public function createSaveAction(): Response
    {
        return $this->render('game/saves/create-save.html.twig', [
            'controller_name' => 'SaveController',
        ]);
        
    }


    /**
     * @Route("/save/created", name="save_created")
     */
    public function saveCreatedAction(Request $request): Response
    {

        $save = new GameSave();
        
            $save->setSaveName($request->get('save-name'));
            $save->setUser($this->getUser());
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($save);
            $entityManager->flush();

            return $this->redirectToRoute('game_home');
            
            
    
    }


}
