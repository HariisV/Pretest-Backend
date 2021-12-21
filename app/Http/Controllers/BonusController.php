<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bonus;

class BonusController extends Controller
{
    public function post(Request $request){
        $pp = $request->data;
        foreach ($pp as $key => $value) {
            Bonus::Create([
                'nama' => $key,
                'bonusRp' => $value['value'],
                'bonusPersen' => $value['discount'],
            ]);
        }
        return response()->json([
            $pp
         ], 201);
        
        
    }
    public function get(){
        $result = Bonus::get();
        return response()->json($result, 201);
    }
    public function update(Request $request){
        $result = Bonus::where('id',$request->id)->update([
            'bonusRp' => $request->bonusRp,
            'bonusPersen' => $request->bonusPersen
        ]);
        return response()->json($result, 201);
    }
    public function delete(Request $request){
        Bonus::Where('id', $request->id)->delete();
        return response()->json($request->id, 201);
    }
}
