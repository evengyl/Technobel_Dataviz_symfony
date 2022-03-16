<?php

namespace App\Controller;

use App\Entity\Products;

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

        return $this->render('products/listProducts.html.twig', [
            'titlePage' => 'Listes des produits',
            "allProd" => $allProd
        ]);
    }


    #[Route('/product/{id<[0-9]+>}', name : "app_product_details")]
    public function prodDetails($id) : Response
    {   
        $prod = $this->productRepo->find($id);

        if(!$prod)
        {
            throw $this->createNotFoundException("Le produit n'existe pas");
        }
        
        return $this->render('products/prodDetails.html.twig', [
            'titlePage' => "Détails de mon article",
            'prod' => $prod
        ]);
    }

    /*
    #[Route('/product/{id<[0-9]+>}', name : "app_product_details")]
    public function prodDetails(Products $prod) : Response
    {   
        return $this->render('products/prodDetails.html.twig', [
            'titlePage' => "Détails de mon article",
            'prod' => $prod
        ]);
    }
    */
}
