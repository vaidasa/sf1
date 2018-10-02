<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function contact()
    {
     $form = $this->createForm(ContactType::class);
     //$form = $this->createForm('App\Form\ContactType');

     return $this->render('contact/contact.html.twig', [
       'our_form' => $form->createView(),
     ]);
    }
}
