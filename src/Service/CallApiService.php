<?php
namespace App\Service;

use ArrayObject;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use App\Entity\Movie;
use App\Repository\MovieRepository;

class CallApiService
{
    private $client;
    private $data = [];
    private $tabId = [];

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function getPopularMovieData():array
    {
            $req = $this->client->request(
                'GET',
                'https://api.themoviedb.org/3/movie/popular?api_key=fd2277fadcdef9e7250232718c7527c1'
            );
            $data = $req->toArray();
            foreach ($data['results'] as $data) {
                array_push($this->data, $data);
            }
            // Je stocke dans ma variable popularMovie mon tableau de liste de vidéo populaire
            $popularMovie = $this->data;
            foreach ($popularMovie as $id) {
                array_push($this->tabId, $id['id']);
            }
            $listIdPopularMovie = $this->tabId;
            dd($popularMovie);
    }
}
