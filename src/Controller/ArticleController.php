<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class ArticleController extends AbstractController
{
    #[Route('/articles', name: 'articles_index')]
    public function index(ArticleRepository $repo): Response
    {
        return $this->render('article/index.html.twig', [
            'articles' => $repo->findAll()
        ]);
    }

    #[Route('/articles/new', name: 'article_create')]
    public function create(Request $request, EntityManagerInterface $manager): Response
    {
        $article = new Article();

        $form = $this->createForm(ArticleType::class, $article);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($article);
            $manager->flush();

            $this->addFlash("success", "L'article <strong>{$article->getTitle()}</strong> a bien été créé");

            return $this->redirectToRoute('article_show', ['slug' => $article->getSlug()]);
        }

        return $this->render('article/create.html.twig', [
            'form' => $form->createView()
        ]);
    }
    #[Route('/article/{slug}/modifier', name: 'article_modifier')]
    public function edit(Request $request, EntityManagerInterface $manager, string $slug): Response
    {
        $article = $manager->getRepository(Article::class)->findOneBy(['slug' => $slug]);

        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->flush();

            $this->addFlash('success', 'article a ete modifie avec succes!');

            return $this->redirectToRoute('article_show', ['slug' => $article->getSlug()]);
        }

        return $this->render('article/modifier.html.twig', [
            'form' => $form->createView(),
            'article' => $article,
        ]);
    }


    #[Route('/article/{slug}/supprimmer', name: 'article_supprimmer')]
    public function delete(Request $request, EntityManagerInterface $manager, string $slug): Response
    {
        $article = $manager->getRepository(Article::class)->findOneBy(['slug' => $slug]);

        if (!$article) {
            throw $this->createNotFoundException("On n'a pas trouve l'article!");
        }

        if ($request->isMethod('POST')) {
            $manager->remove($article);
            $manager->flush();

            $this->addFlash('success', "L'article a ete bien supprime!");

            return $this->redirectToRoute('articles_index');
        }
    }





    #[Route('/articles/{slug}', name: 'article_show')]
    public function show($slug, ArticleRepository $repo)
    {

        $article = $repo->findOneBySlug($slug);

        return $this->render('article/show.html.twig', [
            "article" => $article
        ]);
    }
}
