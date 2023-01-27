<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KosanController extends Controller
{
    public function all(Request $request){
        $id = $request->input('id');
        $limit = $request->input('limit');
        $name = $request->input('id');
        $description = $request->input('description');
        $tags=$request->input('kosan_type');


        $price_from = $request->input('price_from');
        $price_to = $request->input('price_to');


        if($id){
            $kosan = kosan::with(['type_id', 'foto_kosan'])->find($id);
            if($kosan){
                return ResponseFormatter::success(
                    $kosan,
                    'databerhasildiambil'
                );
            }


            else{
                return ResponseFormatter::error(
                    null,
                    'datagagaldiambil',
                    404
                );
            }
        }

        $kosan = kosan::with(['type_id', 'foto_kosan'])->find($id);

        if($name){
            $kosan->where('name', 'like', '%' . $name . '%');
        }

        if($description){
            $kosan->where('description', 'like', '%' . $description . '%');
        }

        if($tags){
            $kosan->where('tags', 'like', '%' . $tags . '%');
        }

        if($price_from){
            $kosan->where('price','>=',$price_from);
        }

        if($price_from){
            $kosan->where('price','<=',$price_to);
        }

        if($type_id){
            $kosan->where('type_id',$type_id);
        }

        return ResponseFormatter::success(
            $kosan->paginate($limit),
            'data berhasil diambil'
        );

    }
}
