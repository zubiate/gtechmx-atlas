<?php
namespace Gtechmx\Atlas\Support;
use GuzzleHttp\Client;

class AtlasClient extends Authenticate
{ 

    protected $client;
    protected $token;

    public function __construct()
    {
        $this->client = new Client(["verify"=>false]);
        $this->token = $this->token()->token_type.' '. $this->token()->access_token;
        
    }

    public function query($query)
    {

        $query = '{"query": "' . str_replace('"', '\"', $query) . '"}';

        try {
            $response = $this->client->post(config('atlas.url').'/graphql', [
                "headers" => [
                    'Content-type' => 'application/json',
                    'Accept' => 'application/json',
                    'x-clientid' => config('atlas.api_key'),
                    'Authorization' => $this->token
                ],
                "body" => $query
            ]);

            return json_decode($response->getBody()->getContents());

        } catch (RequestException $e) {
            if ($e->hasResponse()) {
                return json_decode($e->getResponse()->getBody()->getContents());
            }
        }
    }

    public function mutation($query)
    {
        $this->client = new Client(["verify"=>false]);
        $this->token = $this->token()->token_type.' '. $this->token()->access_token;
        try {
        
            $response = $this->client->post(config('atlas.url').'/graphql', [
                "headers" => [
                    'Content-type' => 'application/graphql',
                    'Accept' => 'application/json',
                    'x-clientid' => config('atlas.api_key'),
                    'Authorization' => $this->token
                ],
                "body" => $query
            ]);

            return json_decode($response->getBody()->getContents());

        } catch (RequestException $e) {
            if ($e->hasResponse()) {
                return json_decode($e->getResponse()->getBody()->getContents());
            }
        }
    }
}
