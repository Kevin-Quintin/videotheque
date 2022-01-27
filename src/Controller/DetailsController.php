<?php

namespace App\Controller;

use App\Repository\MovieRepository;
use App\Repository\RoleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DetailsController extends AbstractController
{
    /**
     * @Route("/details/{id}", name="details")
     */
    public function index(MovieRepository $movieRepository, $id): Response
    {
        $movie = $movieRepository->findById($id);
        return $this->render('details/index.html.twig', [
            'movie' => $movie,
        ]);
    }
}