<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArticleController extends AbstractController
{
    /**
     * @Route("/articles", name="articles_index")
     */
    public function index(ArticleRepository $repo)
    {
        $articles= $repo->findAll();

        return $this->render('articles/index.html.twig', [
            'articles' => $articles
        ]);
    } 
   
     /**
     * @Route("/articles/{slug}", name="articles_show")
     */
    public function show($slug, ArticleRepository $repo)
    {
        $article = $repo->findOneBySlug($slug);

        return $this->render('articles/show.html.twig', [
            'article' => $article
        ]);
    } 
} 
