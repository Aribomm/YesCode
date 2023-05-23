<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use App\Repository\ArticleRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArticleController extends AbstractController
{
    /**
     * @Route("/articles", name="articles_index")
     */
    public function index(ArticleRepository $repo)
    {
        $articles = $repo->findAll();

        return $this->render('articles/index.html.twig', [
            'articles' => $articles
        ]);
    }
    /**
     * @Route("/articles/new", name="articles_create")
     */
    public function create(Request $request){

        $article = new Article();
        
        $form = $this->createForm(ArticleType::class, $article);

        $form->handleRequest($request);

        dump($article);
        return $this->render('articles/create.html.twig', [
            'form' => $form->createView()
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
