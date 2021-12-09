<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class IndexController extends AbstractController
{
    #[Route('/', name: 'homepage')]
//    public function index(): Response
    public function index(Environment $twig, ArticleRepository $articleRepository): Response
    {
        return new Response($twig->render('article/index.html.twig', [
            'articles' => $articleRepository->findAll(),
        ]));
//        return $this->render('index/index.html.twig', [
//            'controller_name' => 'IndexController',
//        ]);
    }
    
    #[Route('/article/{id}', name: 'article')]
    public function show(Environment $twig, Article $article, ArticleRepository $articleRepository): Response
    {
        return new Response($twig->render('article/show.html.twig', [
            'article' => $article,
        ]));
    } 
    
    #[Route('/about', name: 'about')]
    public function about(Environment $twig): Response
    {
        return new Response($twig->render('index/about.html.twig'));
    }
}
