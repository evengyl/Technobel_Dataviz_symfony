<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController //abstractController est le papa des controller en  terme de fct
{
    #[Route('/', name: 'app_home')] //route d'accès url pour "/", 
    //dès que symfony va tomber sur l'url /, il va executer l'action index() !
    public function index(): Response
    //Tout action ! pas fct..., dois répondre un élément de type Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'Bonjour mon premier controller dans la vue',
        ]);
        //ici on demande de rendre la vue home/index.html.twig, avec un tableau de paramètres, 
        //dont l'association clé valeur vaut 'controller_name' => 'Bonjour mon premier controller dans la vue'
    }

    #[Route('/simple', name: 'app_home_simple')]
    public function responseSimple() : Response
    {
        return new Response("Bonjour"); 
        //réponse très large mais très simple ! elle ne prendsp as en charge les vues !!!
    }


    #[Route('/getCateg', name : "app_home_json")]
    public function getCategJson() : Response
    {
        return $this->json(["Categ"  => ["1" => "Categ 1", "2" => "Categ 2"]]); 
        //reponse classique en json, attention c'est du json orienté php
    }
}
