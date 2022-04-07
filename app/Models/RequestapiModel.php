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
}
