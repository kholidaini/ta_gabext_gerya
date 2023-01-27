<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Kosan;
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
            $kosan = Kosan::with(['kosantype', 'fotokosans'])->find($id);
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

        $kosan = Kosan::with(['kosantype', 'fotokosans']);

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

        // if($kosantypes){
        //     $kosan->where('kosantype', $kosantypes);
        // }

        return ResponseFormatter::success(
            $kosan->paginate($limit),
            'data berhasil diambil'
        );

    }
}
