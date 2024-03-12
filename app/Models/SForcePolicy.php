<?php

namespace App\Models;
use GuzzleHttp\{Client,RequestOptions};
use GuzzleHttp\Exception\RequestException;

use \Cache;
use App\Models\SForceAuth;
use \Session;
use GuzzleHttp\Exception\BadResponseException;
use Log;

class SForcePolicy
{
    public static function fetchByID($id)
    {
        SForceAuth::prod();
        try {
            $client = new Client([
                'base_uri' => 'https://americasrvwarranty.my.salesforce.com',
                'verify' => false
                ]);
            $response = $client->get('services/data/v51.0/sobjects/Bed_Bug_Policies__c/' . $id, [
                RequestOptions::HEADERS => [
                    'Authorization' => 'Bearer ' . Cache::get('sfToken'),
                    'X-PrettyPrint' => 1,
                ],
            ]);
            return json_decode($response->getBody()->getContents());
        } catch (BadResponseException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            Log::info('Failed to to fetch by ID');
            Log::critical($responseBodyAsString);
            return null;
        } 
    }

    public static function fetchByEmail($email)
    {
        SForceAuth::prod();
            $q = "select+fields(all)+from+Account+where+Email__c+='" . $email . "'+limit+1";

        try {
            $client = new Client([
                'base_uri' => 'https://americasrvwarranty.my.salesforce.com',
                'verify' => false
                ]);
            $response = $client->get('services/data/v51.0/query/?q=' . $q, [
                RequestOptions::HEADERS => [
                    'Authorization' => 'Bearer ' . Cache::get('sfToken'),
                    'X-PrettyPrint' => 1,
                ],
            ]);
            $result = json_decode($response->getBody()->getContents());
            if (is_object($result) && $result->totalSize == 1)
                return $result->records[0];
            else
                return null;
        } catch (BadResponseException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            Log::info('No matching email found for ' . $email);
            Log::critical($responseBodyAsString);
            return null;
        } 
    }

    public static function upsert($email, $upsertData)
    {
        SForceAuth::prod();
        try {
            $client = new Client([
                'base_uri' => 'https://americasrvwarranty.my.salesforce.com',
                'verify' => false
                ]);
            $response = $client->patch('services/data/v60.0/sobjects/Bed_Bug_Policies__c/Prop_Mgt_Co_Email__c/' . $email, [
                RequestOptions::HEADERS => [
                    'Authorization' => 'Bearer ' . Cache::get('sfToken'),
                    'X-PrettyPrint' => 1,
                ],
                RequestOptions::JSON => $upsertData,
            ]);
            return json_decode($response->getBody()->getContents());
        } catch (BadResponseException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            Log::critical($responseBodyAsString);
            return null;
        }
    }

    public static function fetchCertificate($id)
    {
        SForceAuth::prod();
        try {
            $client = new Client([
                'base_uri' => 'https://americasrvwarranty.my.salesforce.com',
                'verify' => false
                ]);
            $response = $client->get('services/data/v51.0/sobjects/Bed_Bug_Certificate__c/' . $id, [
                RequestOptions::HEADERS => [
                    'Authorization' => 'Bearer ' . Cache::get('sfToken'),
                    'X-PrettyPrint' => 1,
                ],
            ]);
            return json_decode($response->getBody()->getContents());
        } catch (RequestException $e) {
            return false;
        } 
    }


}