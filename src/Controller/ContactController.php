<?php

namespace App\Controller;

use App\Form\ContactType;
use phpDocumentor\Reflection\DocBlock\Description;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function contact(Request $request, \Swift_Mailer $mailer)
    {
     $form = $this->createForm(ContactType::class);

     $form->handleRequest($request);
      $this->addFlash('info', 'Some useful info');

     if ($form->isSubmitted() && $form->isValid()) {
        $contactFormData = $form->getData();
        dump($contactFormData);

       $message = (new \Swift_Message('You Got Mail!'))
                       ->setFrom('test@mail.com')
                       ->setTo('our.own.real@email.address')
                       ->setBody($contactFormData['message'],'text/plain');
       $mailer->send($message);
       dump($mailer);
       $this->addFlash('success', 'It sent!');

       return $this->redirectToRoute('contact');
     }

     return $this->render('contact/contact.html.twig', [
       'our_form' => $form->createView(),
     ]);
    }
}
