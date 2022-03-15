<?php

namespace App\Controller;

use App\Repository\ProductsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductsController extends AbstractController
{
    private $productRepo;

    public function __construct(ProductsRepository $productRepo)
    {
        $this->productRepo = $productRepo;    
    }


    #[Route('/products', name: 'app_products')]
    public function index(): Response
    {
        $allProd = $this->productRepo->findAll();

        return $this->render('products/index.html.twig', [
            'titlePage' => 'Listes des produits',
            "allProd" => $allProd
        ]);
    }

    #[Route('/product/1', name : "app_product_details")]
    public function prodDetails() : Response
    {
        return $this->render('products/prodDetails.html.twig', [
            'titlePage' => "Détais de mon article"
        ]);
    }
}
