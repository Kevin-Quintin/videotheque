<?php

namespace App\Controller;

use App\Repository\MovieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DetailsController extends AbstractController
{
    /**
     * @Route("/details", name="details")
     */
    // ADD ID TO ROUTE AND INDEX
    public function index(MovieRepository $movieRepository): Response
    {
        // $movies = $movieRepository->findyId($id);
        return $this->render('details/index.html.twig', [
            'movies' => $movieRepository->findAll(),
        ]);
    }
}