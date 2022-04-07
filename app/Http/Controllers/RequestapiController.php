<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequestapiModel;
date_default_timezone_set('Asia/Singapore');
class RequestapiController extends Controller{

    protected $version;
    public function __construct(){
        $this->version = new RequestapiModel();
    }

    public function allVersion(){
        $info = $this->version->getALLVersion(); 
        return view('data')->with('version', $info)->with('status', "");
    }

    public function versionByID($id){
        $info = $this->version->getVersionByID($id); 
        return view('data')->with('version', $info)->with('status', "");
    }

    public function versionByTimestamp($timestamp){
        $info = $this->version->getVersionByTimestamp($timestamp);
        if($info == false){
            return view('data')->with('status', 'Invalid timestamp')
                            ->with('version', "");
        }
        if($info == 'No data'){
            return view('data')->with('status', $info)
                            ->with('version', "");
        }
        return view('data')->with('version', $info)
                            ->with('status', "");
    }

    public function checkVersionID($id = "", Request $request){
        $timestamp = date('Y-m-d H:i:s');
        $name = "";
        if(isset($request->update_data)){
            $data = json_decode($request->update_data);
            $name = (!empty($data->name)) ? $data->name : '';
            $timestamp = (!empty($data->timestamp)) ? $data->timestamp : date('Y-m-d H:i:s');
        }
        
        if(!empty($id)){
            $info = $this->version->getVersionByID($id); 
            // dd($info);
            if(!empty($info)){
                $status = $this->updateID($id, $name, $timestamp);
                
            }else{
                $status = $this->version->insertVersionByID($name, $timestamp); 
            }
        }else{
            $status = $this->version->insertVersionByID($name, $timestamp); 
        }
        
        return view('data')
                ->with('status', $status)
                ->with('version', "");
    }

    public function updateID($id, $name, $timestamp){
        $status = $this->version->updateVersionByID($id, $name, $timestamp); 
        return $status;
    }

    public function insertID(Request $request){
        $timestamp = date('Y-m-d H:i:s');
        $name = "";
        if(isset($request->update_data)){
            $data = json_decode($request->update_data);
            $name = (!empty($data->name)) ? $data->name : '';
            $timestamp = (!empty($data->timestamp)) ? $data->timestamp : date('Y-m-d H:i:s');
        }
        $status = $this->version->insertVersionByID($name, $timestamp); 
        return view('data')
                ->with('status', $status)
                ->with('version', "");
    }

}
