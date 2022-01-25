<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use App\Entity\Categorie;
use App\Entity\Movie;
use App\Service\CallApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MovieController extends AbstractController
{
    /**
     * @Route("/movie", name="movie")
     */
    public function index(): Response
    {
        return $this->render('movie/index.html.twig', [
            'controller_name' => 'MovieController',
        ]);
    }

    /**
     * @Route("/product", name="create_product")
     */
    public function addMovie(CallApiService $movie): Response
    {
        $test = $movie->getMovieData();
        $test[0]->content->setAccessible(true);

        //echo $test->array_values('original_title');
        //$test[0]['-content:'] . '<br>';
        dd($test[0]->content);
        //['-content:']['original_title']);

        $product = new Movie();
        $product->setName($test[0]['content']['original_title'] . original_title);
        $product->setMovie(1999);
        $product->setName(1999);
        $product->setDescription('Ergonomic and stylish!');

        // tell movie you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($product);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new product with id ' . $product->getId());
    }
}
