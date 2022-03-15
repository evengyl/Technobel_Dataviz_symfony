<?php

namespace App\Controller;

use App\Entity\Categories;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
                
    }
}
