<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TwitterAPIExchange; // import library package j7mb twitterexchange

class analysTweet extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function analys(Request $request){
        $this->validate($request,[ 'q' => 'required|max:200',]);

        $settings = array(
            'oauth_access_token' => "235781421-jhia2WbLOhDDD74gxlAnllMAvWuBvUJEUtfmczV6",
            'oauth_access_token_secret' => "EKRPt9ozerdNz0mBHZMzmDuNCN5xPfvQD1g2SM4kZ9MBf",
            'consumer_key' => "9EreNeLxaW1geepk3p1rIIkku",
            'consumer_secret' => "Lka6ogc8reVX2L04orCjZQd4JTIpO9NbtRIF7TB3gIsQYWwcq6"
        );

        $url = 'https://api.twitter.com/1.1/search/tweets.json';//endpoint
        $getfield = '?q="' . $request->q . '" :) OR :(&count=100';
        $requestMethod = 'GET';//request 
        
        $twitter = new TwitterAPIExchange($settings);
        $result = $twitter->setGetfield($getfield)
                     ->buildOauth($url, $requestMethod)
                     ->performRequest();
        
        $result = collect(json_decode($result, true));
        $happy = array();
        $sad = array();
        $happyCount = 0;
        $sadCount = 0;

        foreach ($result['statuses'] as $key)
        {
            if ((strpos($key['text'], ':)') !== false))
            {
                $happy[] = $key;
                $happyCount++;
            }

            if ((strpos($key['text'], ':(') !== false))
            {
                $sad[] = $key;
                $sadCount++;
            }
        }

        $resultObject = array(
            'happy' => $happy,
            'sad' => $sad,
            'metadata' => array(
                'happy_count' => $happyCount,
                'sad_count' => $sadCount,
            ),
            'search_metadata' => $result['search_metadata']
        );
        
        
        return view('resultpage')->with('result', $resultObject)->with('q', $request->q);
        
    }

    
}
