<?php

namespace App\DataFixtures;

use App\Entity\Movie;
use App\Repository\MovieRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class MovieFixtures extends Fixture
{
    private $client;
    private $data = [];

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function load(ObjectManager $manager)
    {
        $req = $this->client->request(
            'GET',
            'https://api.themoviedb.org/3/movie/popular?api_key=fd2277fadcdef9e7250232718c7527c1'
        );
        $data = $req->toArray();
        foreach ($data['results'] as $data) {
            array_push($this->data, $data);
        }

        for ($i=0; $i < count($this->data); $i++) { 
            $movie = new Movie();
            $movie->setId($this->data[$i]['id']);
            $movie->setName($this->data[$i]['title']);
            $movie->setDescription($this->data[$i]['overview']);
            $movie->setDuration(120);
            $movie->setCost(10000);
            $movie->setOnlyAdult($this->data[$i]['adult']);
            $movie->setCreatedAt(new \DateTime());
            $movie->setNbLike($this->data[$i]['vote_count']);
            $movie->setImage($this->data[$i]['poster_path']);
            $movie->setOriginCountry($this->data[$i]['original_language']);
            $manager->persist($movie);
        }
        

        $manager->flush();
    }
}
