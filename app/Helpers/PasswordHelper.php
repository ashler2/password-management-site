<?php

namespace App\Helpers;
use Illuminate\Support\Facades\Http;

class PasswordHelper {

    public static function formatWebsite($websiteUrl){
        $regex  = '/(?<=\/\/)(.*)/i';
        preg_match($regex, $websiteUrl,$matches,);
        return $matches[0];

    }

    public static function getPasswordFavicon($websiteUrl){
        if($websiteUrl == null){
            return null;
        }
        $apiUrl = 'http://favicongrabber.com/api/grab/';
        $response  = Http::get($apiUrl.$websiteUrl);
        return $response->json()['icons'][0]['src'];

    }
}