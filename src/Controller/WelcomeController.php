<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WelcomeController extends AbstractController
{
    /**
     * @Route("/", name="welcome")
     */
    public function index()
    {
      return $this->render('welcome/index.html.twig',
        ['controller_name' => 'WelcomeController']);
    }

  /**
   * @Route("/hello-page/{name}",
   *    name="hello_page",
   *    requirements={"name" = "[A-Za-z]+"}),
   * @param Request $request
   * @param string $name
   * @return \Symfony\Component\HttpFoundation\Response
   */
    public function hello($name = 'Petter Rabbit') {

      return $this->render('hello_page.html.twig',
        [
          'name' => $name, // $request->query->get('name', $name),

        ]);
    }
}
