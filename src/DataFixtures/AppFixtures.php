<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Article;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        // Load Article fixtures
        for ($i = 1; $i <= 20; $i++) {
            $article = new Article();

            $title = $faker->sentence(2);
            $intro = $faker->paragraph(2);
            $content = "<p>" . implode("</p><p>", $faker->paragraphs(3)) . "<p>";
            $image = $faker->imageUrl();

            $article->setTitle($title);
            $article->setIntro($intro);
            $article->setContent($content);
            $article->setImage($image);

            $manager->persist($article);
        }

        // Load User fixtures
        $genres = ['male', 'female'];

        for ($i = 0; $i <= 20; $i++) {
            $user = new User();

            $genre = $faker->randomElement($genres);

            $picture = 'https://randomuser.me/api/portraits/';
            $pictureId = $faker->numberBetween(1, 99) . '.jpg';

            $picture .= ($genre == 'male' ? 'men/' : 'women/') . $pictureId;
            $user->setFirstname($faker->firstname($genre))
                 ->setLastname($faker->lastname)
                 ->setEmail($faker->email)
                 ->setAvatar($picture)
                 ->setPresentation($faker->sentence())
                 ->setHash('password');

            $manager->persist($user);
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