<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductsController extends AbstractController
{
    #[Route('/products', name: 'app_products')]
    public function index(): Response
    {
        return $this->render('products/index.html.twig', [
            'titlePage' => 'Listes des produits'
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
