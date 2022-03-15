<?php

namespace App\Controller;

use App\Repository\CategoriesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoriesController extends AbstractController
{
    private $repo;

    public function __construct(CategoriesRepository $repo)
    {
        $this->repo = $repo;
    }


    #[Route('/categ', name: 'app_categ')]
    public function categ(): Response
    {
        $allCateg = $this->repo->findAll();

        return $this->render('categories/categ.html.twig', [
            'titlePage' => 'Liste des catégories',
            'allCateg' => $allCateg,
            //compact("allCateg")
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
