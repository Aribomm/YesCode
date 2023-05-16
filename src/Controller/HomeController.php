<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home_page')]
    public function index(): Response
    {
        /*   $city  = "gotham"; */

        /* 
        $games = [
            "Starcraft 2" => 8,
            "BF6" => 128,
            "Metro Exodus"=> 1
        ]; */
        /*       $games = [ "Starcraft 2", "BF6", "Metro Exodus"]; */
        /*  $user = new stdClass();
      $user->isConnected = false; */
        /*  $author = "Lois Lane";
        $article = new stdClass();
        $article-> title = "Theorie du complot";
        $article->intro = " Its a complot thats its its its";
        $article->content = "bla bla bla , ye ye ye , uf u fu f"; */
        return $this->render('home/index.html.twig', []);
            /*   "user" => $user 
            'article' => $article,
            'auteur' => $author 
           "games" => $games 
              "games" => $games  
            "city" => $city */
       
    }
}
