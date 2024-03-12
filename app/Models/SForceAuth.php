<?php

namespace App\Models;
use GuzzleHttp\{Client,RequestOptions};
use GuzzleHttp\Exception\RequestException;
use \Cache;

class SForceAuth
{
    protected $token = '';

    public static function test() {
        $payLoad = array(
            'client_id' => \config('sforce.sandbox.client_id'),
            'client_secret' => \config('sforce.sandbox.client_secret'),
            'username' => \config('sforce.sandbox.username'),
            'password' => \config('sforce.sandbox.password'),
            'grant_type' => \config('sforce.sandbox.grant_type')
        );
        $client = new Client(['verify' => false, 'headers' => ['Content-type' => 'application/json']]);
        $response = $client->post(\config('sforce.sandbox.url'), ['form_params' => $payLoad]);  
        $token = json_decode($response->getBody()->getContents())->access_token;
        if (!Cache::add('sfToken', $token, 1000))
            Cache::put('sfToken', $token, 1000);
    }
    public static function prod() {
        $payLoad = array(
            'client_id' => \config('sforce.prod.client_id'),
            'client_secret' => \config('sforce.prod.client_secret'),
            'username' => \config('sforce.prod.username'),
            'password' => \config('sforce.prod.password'),
            'grant_type' => \config('sforce.prod.grant_type')
        );
        $client = new Client(['verify' => false, 'headers' => ['Content-type' => 'application/json']]);
        $response = $client->post(\config('sforce.prod.url'), ['form_params' => $payLoad]);  
        $token = json_decode($response->getBody()->getContents())->access_token;
        if (!Cache::add('sfToken', $token, 1000))
            Cache::put('sfToken', $token, 1000);
            }
    public function refresh() {

    }

    public static function describe($id)
    {
        SForceAuth::prod();
        try {
            $client = new Client([
                'base_uri' => 'https://americasrvwarranty.my.salesforce.com',
                'verify' => false
                ]);
            $response = $client->get('services/data/v50.0/sobjects/', [
                RequestOptions::HEADERS => [
                    'Authorization' => 'Bearer ' . Cache::get('sfToken'),
                    'X-PrettyPrint' => 1,
                ],
            ]);
            return json_decode($response->getBody()->getContents());

        } catch (ClientException $e) {
            $error = json_decode($response->getBody()->getContents());
            Log::info(sprintf("%s - line %d - Error Info", __FILE__, __LINE__));
            Log::critical('Budco Cancel Upload Error: ' . print_r($e->getMessage()));
            return null;
        } 
    }
}