<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function contact(): Response
    {
        return $this->render('contact/contact.html.twig', [
            'titlePage' => 'Page de contact',
        ]);
    }

    #[Route('/contact/send', name:"app_contact_posted")]
    public function contactSend():Response
    {
        return $this->render('contact/sendedResponseOk.html.twig', [
            'titlePage' => "Validation de l'envoi du formulaire"
        ]);
    }
}
