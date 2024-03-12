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
    public static function fetch($id)
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

    // Fetches currently logged in user from salesforce along with 200 (capped) certificates belonging to them
    public static function fetchWithCertificates()
    {
        $id = 'a1X4x00000i1soV';
        SForceAuth::prod();
            //$q = "select+fields(all)+(select+fields(all)+fromBed_Bug_Certificates__r+limit+100)+from+Bed_Bug_Policies__c+where+id+='" . Auth::user()->salesforce_id . "'+limit+1";
            $q = "select+fields(all)+,+(select+fields(all)+from+Bed_Bug_Certificates__r+limit+200)+from+Bed_Bug_Policies__c+where+id+='" . $id . "'+limit+1";

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

            // Checking if user has any certificates, change the name of the property to something more clear
            if (is_object($result) && $result->totalSize > 0)
            {
                $policyHolder = $result->records[0];
                if (property_exists($policyHolder, 'Bed_Bug_Certificates__r') && $policyHolder->Bed_Bug_Certificates__r == null)
                    $policyHolder->certificates = [];
                else
                {
                    $policyHolder->certificates = $policyHolder->Bed_Bug_Certificates__r->records;
                    unset($policyHolder->Bed_Bug_Certificates__r);
                }

                return $policyHolder;
            }
            else
                return null;
        } catch (BadResponseException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
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