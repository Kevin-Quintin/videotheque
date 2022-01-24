<?php

namespace App\Service;

// use DateTime;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class CallApiService
{
    // private $client;

    // public function __construct(HttpClientInterface $client)
    // {
    //     $this->client = $client;
    // }


    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function getMovieData(): array
    {
        $response = $this->client->request(
            'GET',
            'https://api.themoviedb.org/3/movie/550?api_key=fd2277fadcdef9e7250232718c7527c1'
        );
        return  $response->toArray();
        // return $this->getApi('FranceLiveGlobalData');
    }
}
