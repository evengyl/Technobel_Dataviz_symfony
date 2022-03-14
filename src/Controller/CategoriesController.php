<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoriesController extends AbstractController
{
    #[Route('/categ', name: 'app_categ')]
    public function categ(): Response
    {
        return $this->render('categories/categ.html.twig', [
            'titlePage' => 'Liste des catégories',
        ]);
    }

    #[Route("/categ/1/subcateg", name : "app_categ_sub_categ")]
    public function categProd(): Response
    {
        return $this->render("categories/categSubcateg.html.twig", [
            'titlePage' => 'Liste des sous catégories de cette catégorie principale'
        ]);
    }
}
