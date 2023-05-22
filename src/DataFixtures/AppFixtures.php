<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
       

        for ($i=1; $i <= 10 ; $i++) { 
            $article= new Article();
            $article->setTitle("Article numéro: ". $i);
            $article->setIntro("This elephant is flying");
            $article->setContent("<p>Je suis du le 1er paragraphe</p>
                                  <p>Je suis du le 2eme paragraphe</p>
                                  <p>Je suis du le 3eme paragraphe</p>");
            $article->setImage("https://media.istockphoto.com/id/834760270/fr/photo/image-conceptuelle-dun-%C3%A9l%C3%A9phant.jpg?s=612x612&w=0&k=20&c=E_ApjZ7h7-QZJhFRLtFAmM6_ELKipmG_yr5FLfcQPPA=");
            $article->setCreatedAt(new \DateTime());
 
            $manager->persist($article);
        }
            

        $manager->flush();
    }
}
