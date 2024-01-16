<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {
        return view('orders', [
            "title" => "All orders",
            "orders" => Order::all()
        ]);
    }

    public function show($order_id){
        $order = Order::find($order_id);
        return view('orderDetail', [
            'title' => "An order detail",
            "order" => $order
        ]);
    }
    
    public function create(){
        return view('addOrder', [
            "title" => "Add order",
            "items" => Item::where('stock', '!=', 0)->get()
        ]);
    }

    public function store(Request $request){
        $data = $request->except('_token');
        $data = collect(array_keys($data))->reduce(function($acc, $curr) use ($data){
            [$itemId, $name] = explode("_", $curr);
            
            if(!isset($acc["item_$itemId"])){
                $item = Item::find($itemId);
                $ordered_quantity = $data[$itemId . '_quantity'];

                $ordered_quantity = $ordered_quantity > $item->stock ? $item->stock : $ordered_quantity;
                $ordered_quantity = $ordered_quantity < 1 ? 1 : $ordered_quantity;

                $acc["item_$itemId"] = [
                    "id" => $itemId,
                    "quantity" => $ordered_quantity
                ];
            }
            return $acc;
        }, []);

        $data = array_values($data);

        $order = Order::create([
            "buyer_id" => auth()->user()->id
        ]);

        foreach($data as $item){
            OrderDetail::create([
                "order_id" => $order->id,
                "item_id" => $item['id'],
                "quantity" => $item['quantity']
            ]);
            
            $item_obj = Item::find($item['id']);
            $item_obj->stock -= $item['quantity'];
            $item_obj->save();
        }

        return redirect("/orders/$order->id")->with('success', 'You just order something!');
    }
}
