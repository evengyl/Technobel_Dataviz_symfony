<?php

namespace App\Controller;

use App\Entity\Categories;
use App\Entity\Products;
use App\Entity\SubCategories;

use Symfony\Component\Form\Extension\Core\Type\TextType;


use Doctrine\ORM\EntityManagerInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Exception\TokenNotFoundException;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'titlePage' => 'Page d\'administration',
        ]);
    }

    #[Route('/admin/addCateg', name : "app_admin_add_categ", methods:["POST", "GET"])]
    public function addCategories(Request $req, EntityManagerInterface $em) : Response
    {
        $formAddCateg = $this->createFormBuilder()
        ->add('name', TextType::class, [
            "attr" => ["class" => "form-control", "placeholder" => "Nom de la catégorie"]
        ])
        ->add('description', TextType::class, [
            "attr" => ["class" => "form-control", "placeholder" => "Description de la catégorie"]
        ])
        ->add('Submit', SubmitType::class, [
            "attr" => ["class" => "btn btn-primary"]
        ])
        ->getForm();


        $formAddCateg->handleRequest($req);

        if($formAddCateg->isSubmitted() && $formAddCateg->isValid())
        {
            $tmp = $formAddCateg->getData();
            
            $newCateg = new Categories;
            $newCateg->setName($tmp["name"]);
            $newCateg->setDescription(($tmp["description"]));

            $em->persist($newCateg);
            $em->flush();
            return $this->redirectToRoute("app_admin_add_categ");
        }
        else
        {
            return $this->render('admin/index.html.twig', [
                "titlePage" => "ADMIN : Ajout d'une catégorie",
                "fragment" => "admin/formAddCateg.html.twig",
                "form" => $formAddCateg->createView()
            ]);
        }


        


        /* 
        //Première version (il faut le formulaire dans le template !!!!)
        if($req->isMethod("GET"))
        {
            return $this->render('admin/index.html.twig', [
                "titlePage" => "ADMIN : Ajout d'une catégorie",
                "fragment" => "admin/formAddCateg.html.twig"
            ]);
        }
        else if($req->isMethod("POST"))
        {
            $dataForm = $req->request->all();
            if($this->isCsrfTokenValid("MonSuperSecret", $dataForm["csrf_token"]))
            {
                $newCateg = new Categories;
                $newCateg->setName($dataForm["name"]);
                $newCateg->setDescription(($dataForm["description"]));

                $em->persist($newCateg);
                $em->flush();
                return $this->redirectToRoute("app_admin_add_categ");
            }
            else
            {
                throw new TokenNotFoundException("Token non valide");
            }
        }

        return $this->render("admin/index.html.twig", [
            "titlePage" => "Page d\'administration"
        ]);
        */
                
    }


    #[Route('/admin/addSubcateg', name : "app_admin_add_subcateg", methods:["POST", "GET"])]
    public function addSubcategories(Request $req, EntityManagerInterface $em) : Response
    {
        if($req->isMethod("GET"))
        {
            return $this->render('admin/index.html.twig', [
                "titlePage" => "ADMIN : Ajout d'une sous catégorie",
                "fragment" => "admin/formAddSubcateg.html.twig"
            ]);
        }
        else if($req->isMethod("POST"))
        {
            $dataForm = $req->request->all();
            if($this->isCsrfTokenValid("MonSuperSecret", $dataForm["csrf_token"]))
            {
                $newSubcateg = new SubCategories;
                $newSubcateg->setName($dataForm["name"]);
                $newSubcateg->setDescription(($dataForm["description"]));

                $em->persist($newSubcateg);
                $em->flush();
                return $this->redirectToRoute("app_admin_add_subcateg");
            }
            else
            {
                throw new TokenNotFoundException("Token non valide");
            }
        }

        return $this->render("admin/index.html.twig", [
            "titlePage" => "Page d\'administration"
        ]);
                
    }



    #[Route('/admin/addProduct', name : "app_admin_add_product", methods:["POST", "GET"])]
    public function addProduct(Request $req, EntityManagerInterface $em) : Response
    {
        if($req->isMethod("GET"))
        {
            return $this->render('admin/index.html.twig', [
                "titlePage" => "ADMIN : Ajout d'un produit",
                "fragment" => "admin/formAddProduct.html.twig"
            ]);
        }
        else if($req->isMethod("POST"))
        {
            $dataForm = $req->request->all();
            if($this->isCsrfTokenValid("MonSuperSecret", $dataForm["csrf_token"]))
            {
                $newProduct = new Products;
                $newProduct->setName($dataForm["name"]);
                $newProduct->setPrice($dataForm["price"]);
                $newProduct->setWeight($dataForm["weight"]);

                $em->persist($newProduct);
                $em->flush();
                return $this->redirectToRoute("app_admin_add_product");
            }
            else
            {
                throw new TokenNotFoundException("Token non valide");
            }
        }

        return $this->render("admin/index.html.twig", [
            "titlePage" => "Page d\'administration"
        ]);
                
    }
}
