<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\CallApiService;


class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(CallApiService $CallApiService): Response
    {


        //dd($CallApiService->getMovieData());
        return $this->render('home/index.html.twig', [
            'data' => $CallApiService->getMovieData(),
        ]);
    }
}
