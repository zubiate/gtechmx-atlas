<?php

namespace Gtechmx\Atlas\Support;
use GuzzleHttp\Client;

class Authenticate
{ 
      protected $client;

    public function __construct()
    {
        $this->client = new Client(["verify"=>false]);

    }

    public function token(){
        if(\Cache::get('token_access') != null){
            return \Cache::get('token_access');
        }
        return $this->getToken();
    }

    private function getToken(){
        try {
            $response = $this->client->post(config('atlas.url').'/secure/connect/token', [
                'headers' => [
                    'Contet-type' => 'application/x-www-form-urlencoded',
                    'x-clientid' => config('atlas.api_key')
                ],
                'form_params' => [
                    'client_id' =>      config('atlas.client_id'),
                    'client_secret' =>  config('atlas.client_secret'),
                    'grant_type' =>     config('atlas.grant_type'),
                    'scope'  =>         config('atlas.scopes')
                ]
            ]);

            $response = json_decode($response->getBody()->getContents());
            \Cache::put('token_access', $response, $response->expires_in);
            return $response;
        } catch (RequestException $e) {
            if ($e->hasResponse()) {
                return json_decode($e->getResponse()->getBody()->getContents());
            }
        }
    }
}
