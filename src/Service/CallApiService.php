<?php

namespace App\Service;

// use DateTime;

use ArrayObject;
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
        $response = array();
        // $store = array();
        for ($i = 550; $i <= 550; $i++) {

            $request = $this->client->request(
                'GET',
                'https://api.themoviedb.org/3/movie/' . $i . '?api_key=fd2277fadcdef9e7250232718c7527c1'
            );
            $request->toArray();
            //dd($request);
            // $store = array_merge($store, $request);
            // //$response1 = $request->toArray();
            // var_dump($store);
            Array_push($response, $request);
        }
        //dd($response);


        return  $response;
        // return $this->getApi('FranceLiveGlobalData');
    }
}
