<?php

namespace TuneupTechnology;

class Client
{
    /**
     * Setup the API client
     *
     * @param array $data
     * @param string $endpoint
     * @return mixed
     */
    public static function response($data, $endpoint)
    {
        // Setup variables
        $base_url = "https://app.tuneuptechnology.com/api";
        $url = "$base_url/$endpoint";
        $version = "1.0.0";
    
        // Setup cURL
        $request = curl_init($url);
        curl_setopt($request, CURLOPT_POST, true);
        curl_setopt($request, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($request, CURLOPT_RETURNTRANSFER, true);

        // Setup headers
        curl_setopt($request, CURLOPT_HTTPHEADER, [
            "Content-Type: application/json",
            "User-Agent: TuneupTechnologyApp/PHPClient/$version"
        ]);

        // Execute cURL request
        $curl = curl_exec($request);
        curl_close($request);
        $response = json_encode(json_decode($curl), JSON_PRETTY_PRINT);
        return $response;
    }
}
