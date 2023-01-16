<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
USE Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HelloController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index() : Response
    {    
        return $this->render(
            'home.html.twig'
        );
    }
    
    #[Route('/cardapio', name: 'app_cardapio')]
    public function cardapio() : Response
    {    
        return $this->render(
            'cardapio.html.twig'
        );
    }

    #[Route('/contatos', name: 'app_contatos')]
    public function contatos() : Response
    {    
        return $this->render(
            'contatos.html.twig'
        );
    }
    
}

?>