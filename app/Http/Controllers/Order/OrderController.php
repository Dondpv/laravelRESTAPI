<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderModel;
use Psy\Util\Json;
use Validator;


class OrderController extends Controller
 {
   public function order(){
        return response()->json(OrderModel::get(),200);
  }

    public function orderById($id){
        $order = OrderModel::find($id);
        if (is_null($order) ) {
            return response()->json(['error' => true, 'message' => 'Not found'], 404);
        }
    return response()->json($order,200);
   }
    public function orderSave(Request $req) {
        $rules = [
           'ordernum' => 'required|min:2|max:20',
           'name' => 'required|min:3',
           'address' => 'required|min:3',
            'date'=>'required',
            'price'=>'required',
       ];
       $validator = Validator::make($req->all(), $rules);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
       $order = OrderModel::create($req->all());
       return response()->json($order, 201);
    }

    public function orderEdit(Request $req, $id) {
        $rules = [
            'ordernum' => 'required|min:2|max:20',
            'name' => 'required|min:3',
            'address' => 'required|min:3',
            'date'=>'required',
            'price'=>'required',
        ];
        $validator = Validator::make($req->all(), $rules);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        $order = OrderModel::find($id);
        if (is_null($order) ) {
            return response()->json(['error' => true, 'message' => 'Not found'], 404);
        }
        $order->update($req->all());
        return response()->json($order, 200);

    }
    public function orderDelete(Request $req, $id) {
        $order = OrderModel::find($id);
        if (is_null($order) ) {
            return response()->json(['error' => true, 'message' => 'Not found'], 404);
        }
        $order->delete();
        return response()->json('',204);
    }
}

