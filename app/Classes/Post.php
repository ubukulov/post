<?php


namespace App\Classes;

use GuzzleHttp\Client;

class Post
{
    protected $url = 'https://track.kazpost.kz/api/v2/';
    public $trackerCode = 'CC016695190KZ';

    public function parcelDetail()
    {
        $client = new Client(['base_uri' => $this->url]);
        $response = $client->request('GET', $this->trackerCode);

        return json_decode($response->getBody()->getContents());
    }

    public function getEvents()
    {
        $client = new Client(['base_uri' => $this->url]);
        $response = $client->request('GET', $this->trackerCode . '/events');

        return json_decode($response->getBody()->getContents());
    }
}
