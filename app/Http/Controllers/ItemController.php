<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index() {
        return view('items', [
            "title" => "All items",
            "items" => Item::all()
        ]);
    }

    public function create(){
        return view('addItem', [
            "title" => "Add Item",
        ]);
    }

    public function store(Request $request){
        $data = $request->validate([
            "name" => "required|min:3",
            "type" => "required|in:goods,service",
            "price" => "required|numeric|min:0|max:1000",
            "stock" => "required|numeric|min:0|max:1000"
        ]);

        Item::create($data);

        return redirect('/items')->with('success', 'You just added an item!');
    }

    public function edit($id){
        $item = Item::find($id);
        return view('editItem', [
            "title" => "Edit Item",
            "item" => $item
        ]);
    }

    public function update(Request $request, Item $item){
        $data = $request->validate([
            "name" => "required|min:3",
            "type" => "required|in:goods,service",
            "price" => "required|numeric|min:0|max:1000",
            "stock" => "required|numeric|min:0|max:1000"
        ]);

        $item->update($data);
        
        return redirect('/items')->with('success', 'You just updated an item!');
    }

    public function destroy($id){
        Item::destroy($id);
        return redirect('/items')->with('success', 'You just deleted an item!');
    }
}
