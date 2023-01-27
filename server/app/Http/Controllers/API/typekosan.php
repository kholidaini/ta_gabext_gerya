<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\KosanTypes;
use Illuminate\Http\Request;

class KosanTypeController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit');
        $name = $request->input('id');
        $showkosan = $request->input('showkosan');


        if ($id) {
            $kosantypes = KosanTypes::with(['kosan'])->find($id);
            if ($kosantypes) {
                return ResponseFormatter::success(
                    $kosantypes,
                    'databerhasildiambil'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'datagagaldiambil',
                    404
                );
            }
        }

        $kosantypes = KosanTypes::query();

        if($name){
            $kosantypes->where('name', 'like', '%' . $name . '%');
        }

        if($showkosan){
            $kosantypes->with('kosan');
        }

        return ResponseFormatter::success(
            $kosantypes->paginate($limit),
            'datatypekosanberhasil'
        );
    }
}
