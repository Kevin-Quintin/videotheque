<?php

namespace App\Controller;

use App\Repository\MovieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListeController extends AbstractController
{
    /**
     * @Route("/liste", name="liste")
     */
    public function index(MovieRepository $movieRepository): Response
    {
        return $this->render('liste/index.html.twig', [
            'movies' => $movieRepository->findAll(),
        ]);
    }
}