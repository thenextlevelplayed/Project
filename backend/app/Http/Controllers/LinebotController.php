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
    public function reply(Request $request)
{
    Log::info($request->all());
    return response('HTTP_OK',Response::HTTP_OK);
}
}
