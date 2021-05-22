<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ArticlesRepository;
use Symfony\Component\HttpFoundation\Request;




class HomeController extends AbstractController
{

    private $articleRepository;
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {

        //  $articles = $this->articleRepository->findAll(); // affichage de tous les articles
      $articles = $this->articleRepository->findLast(3); //affichag des n derniers articles
       return $this->render('home/index.html.twig', ['articles' => $articles]);
    }

    /**
     * @Route("/hello/{name}", name="hello_name")
     */
    public function helloName($name)
    {
        return new Response('Hello ' . $name);
    }


    public function __construct(ArticlesRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }





}
