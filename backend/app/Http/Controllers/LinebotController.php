<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use LINE\LINEBot;
class LinebotController extends Controller
{
    //
    // public function reply(Request $request){
    // Log::info($request->all());
    // return response('HTTP_OK',Response::HTTP_OK);
    // }
    public function reply(Request $request){
        $httpClient = new CurlHTTPClient(env('LINE_BOT_CHANNEL_ACCESS_TOKEN'));
        $bot = new LINEBot($httpClient, ['channelSecret' => env('LINE_BOT_CHANNEL_SECRET')]);
        
        try {
            $bot->parseEventRequest($request->getContent(), $request->header('X-Line-Signature'));
        }catch (LINEBot\Exception\InvalidSignatureException $exception){
            return response('An exception class that is raised when signature is invalid.',Response::HTTP_FORBIDDEN);
        }catch (LINEBot\Exception\InvalidEventRequestException $exception){
            return response('An exception class that is raised when received invalid event request.',Response::HTTP_FORBIDDEN);
        }
        
        $text = $request['events'][0]['message']['text'];
        $replyToken = $request['events'][0]['replyToken'];
        $response = $bot->replyText($replyToken, $text);
        
        if ($response->isSucceeded()){
            return response('HTTP_OK', Response::HTTP_OK);
        }else{
            Log::debug($response->getHTTPStatus());
            Log::debug($response->getRawBody());
            return response('HTTP_UNPROCESSABLE_ENTITY', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
}
