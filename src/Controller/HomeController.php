<?php

namespace App\Controller;

/* use Faker\Factory; */
use Cocur\Slugify\Slugify;
use App\Repository\ArticleRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home_page")
     */
    public function index(ArticleRepository $repo)
    {

        $articles = $repo->findLastArticles(3);
       /*  $faker = Factory::create("fr_FR");

        $title = $faker->sentence(2); // for title
        $intro = $faker->paragraph(2);
        $content = "<p>" . implode("</p><p>", $faker->paragraphs(5)) . "</p>";
        $image = "https://picsum.photos/400/300";
        $createdAt = $faker->dateTimeBetween('-2 years'); */

        return $this->render('home/index.html.twig', [
          "articles" => $articles
          /*
            "contenu" => $content */
            
        ]);
    }
}
