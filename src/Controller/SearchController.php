<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\MovieRepository;
use App\Entity\Movie;
use Symfony\Component\HttpFoundation\Request;
use App\Form\SearchMoviesType;


class SearchController extends AbstractController
{
    /**
     * @Route("/search", name="search")
     */
    //////////////////////// list movies//////////////////////////////////////////////

    public function index(MovieRepository $movieRepo,Request $request): Response
    {
        $movies = $movieRepo->findAll();
        $form = $this->createForm(SearchMoviesType::class);
        $search = $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid(['active' => true],['created_at' => 'desc'], 5)){
            //on recherche les video aux list movies
            
             $movies = $movieRepo->search($search->get('name')->getData());
            
        }

        return $this->render('search/index.html.twig', [
            'controller_name' => 'SearchController',
            'form' => $search ->createView(),
            
             'listmovies'=> $movies
        ]);
    }

   
   
  
}
