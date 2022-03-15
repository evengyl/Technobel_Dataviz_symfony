<?php

namespace App\Controller;

use App\Repository\CategoriesRepository;
use App\Repository\SubCategoriesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoriesController extends AbstractController
{
    private $categRepo;
    private $subcategRepo;

    public function __construct(CategoriesRepository $categRepo, SubCategoriesRepository $subcategRepo)
    {
        $this->categRepo = $categRepo;
        $this->subcategRepo = $subcategRepo;
    }


    #[Route('/categ', name: 'app_categ')]
    public function categ(): Response
    {
        $allCateg = $this->categRepo->findAll();

        return $this->render('categories/categ.html.twig', [
            'titlePage' => 'Liste des catégories',
            'allCateg' => $allCateg,
            //compact("allCateg")
        ]);
    }

    #[Route("/categ/1", name : "app_subcateg")]
    public function subcateg(): Response
    {
        $allSubcateg = $this->subcategRepo->findAll();

        return $this->render('categories/subcateg.html.twig', [
            'titlePage' => 'Liste des sous catégories',
            'allSubcateg' => $allSubcateg,
            //compact("allSubcateg")
        ]);
    }
}
