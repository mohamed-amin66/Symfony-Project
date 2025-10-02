<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\AuthorRepository;


final class AuthorController extends AbstractController
{
    #[Route('/author', name: 'app_author')]
    public function index(): Response
    {
        return $this->render('author/index.html.twig', [
            'controller_name' => 'AuthorController',
        ]);
    }
    #[Route('/show/{name}', name: 'showAuther')]
    public function showAuthor($name)
    {
        return $this->render('author/show.html.twig', ['autherName' => $name]);
    }
    #[Route('/showall', name: "showAll")]
    public function showAll(AuthorRepository $authorRepository){
        $authors = $authorRepository->findAll();
        return $this->render('author/showall.html.twig', ['authors'=>$authors]);
    }
}
