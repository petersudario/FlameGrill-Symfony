<?php

namespace App\DataFixtures;

use App\Entity\FormPost;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $post1 = new FormPost();
        $post1->setNome('Pedro');
        $post1->setTelefone('+5541988022368');
        $post1->setEmail('pedro@gmail.com');
        $post1->setMensagem('Olá');
        $manager->persist($post1);
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
