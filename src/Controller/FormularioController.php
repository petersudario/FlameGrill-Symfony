<?php

namespace App\Controller;

use DateTime;
use App\Entity\FormPost;
use App\Repository\FormPostRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FormularioController extends AbstractController
{
    #[Route('/contatos', name: 'app_formulario')]
    public function add(Request $request, FormPostRepository $posts): Response
    {
        $form = new FormPost();

        $form = $this->createFormBuilder($form)
            ->add('nome')
            ->add('telefone')
            ->add('email')
            ->add('mensagem', TextareaType::class, ['attr' => ['class' => 'tinymce'],])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $post = $form->getData();

            $posts->save($post, true);
            
            $this->addFlash('success', 'Sua mensagem foi enviada para a equipe do Flame Grill. Agradecemos sua cooperação.');

            return $this->redirectToRoute('app_contatos');
        }

        return $this->renderForm(
            'contatos.html.twig',
            [
                'form' => $form
            ]
            );
    }
}
