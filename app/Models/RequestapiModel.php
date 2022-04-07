<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RequestapiModel extends Model{
    use HasFactory;

    public function getALLVersion(){
        $all_data = DB::table('version')
                ->get();

        $version = array();
        foreach($all_data as $data){            
            $version[$data->id] = array(
                'id'    => $data->id,
                'name'  => $data->name,
                'created_at'  => $data->created_at,
                'updated_at'  => $data->updated_at,
            );
        }
        //dd($version);
        return $version;
    }

    public function getVersionByID($id){
        $all_data = DB::table('version')
                ->where('id', '=', $id)
                ->get();

        $version = array();
        foreach($all_data as $data){            
            $version[$data->id] = array(
                'id'    => $data->id,
                'name'  => $data->name,
                'created_at'  => $data->created_at,
                'updated_at'  => $data->updated_at,
            );
        }
        return $version;
    }

    public function getVersionByTimestamp($timestamp){
        if(((string) (int) $timestamp === $timestamp) && ($timestamp <= PHP_INT_MAX) && ($timestamp >= ~PHP_INT_MAX)){
            $timestamp = date('Y-m-d H:i:s', $timestamp);

            $all_data = DB::table('version')
                ->where('created_at', '=', $timestamp)
                ->orwhere('updated_at', '=', $timestamp)
                ->get();

            if(empty($all_data->toArray())){
                $status = "No data";            
                return $status;
            }else{
                $version = array();
                foreach($all_data as $data){            
                    $version[$data->id] = array(
                        'id'    => $data->id,
                        'name'  => $data->name,
                        'created_at'  => $data->created_at,
                        'updated_at'  => $data->updated_at,
                    );
                }
                return $version;
            }
        
        }
        return false;
        
    }

    public function insertVersionByID($name, $timestamp){
        $all_data = DB::table('version')->insert([
                    'name' => $name,
                    'created_at' => $timestamp,
                    'updated_at' => $timestamp,
                    ]);
        if($all_data == true){
            return "Updated";
        }else{
            return "Error";
        }
    }

    public function updateVersionByID($id, $name = "", $timestamp = ""){
        if(!empty($name)){
            $all_data = DB::table('version')
                    ->where('id', $id)
                    ->update(['name' => $name, 'updated_at' => $timestamp]);
        }else{
            $all_data = DB::table('version')
                    ->where('id', $id)
                    ->update(['updated_at' => $timestamp]);
        }
        
        if($all_data == true){
            return "Updated";
        }else{
            return "Error";
        }
    }
}
