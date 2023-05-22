<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Article;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager){

        $faker = Factory::create();

        for ($i=1; $i <= 20 ; $i++) { 

        $article= new Article();
            

        $title = $faker->sentence(2); 
        $intro = $faker->paragraph(2); 
        $content ="<p>" . implode("</p><p>",$faker->paragraphs(5)) . "<p>" ; 
        $image = $faker->imageUrl();

       /*  $createdAt = $faker->dateTimeBetween('-2 months');
 */
           
            $article->setTitle($title);
            $article->setIntro( $intro);
            $article->setContent( $content);
            $article->setImage($image);
           /*  $article->setCreatedAt($createdAt); */
 
            $manager->persist($article);
    
            // $manager->persist();
        }

        $manager->flush();
    }
}
          
          
          
          
       /*        $article= new Article();
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
*/