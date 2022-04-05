<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestapiController extends Controller{
    public function getData(Request $request){
        $version = DB::table('version')
                ->where('id', $request->request_url)->first();

        dd($version);
        return $version;
    }
}
