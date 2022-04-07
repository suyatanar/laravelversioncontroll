<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequestapiModel;

class RequestapiController extends Controller{

    protected $version;
    public function __construct(){
        $this->version = new RequestapiModel();
    }

    public function allVersion(){
        $info = $this->version->getALLVersion(); 
        return view('data')->with('version', $info);
    }

}
