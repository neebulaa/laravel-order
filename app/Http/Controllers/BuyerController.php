<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use Illuminate\Http\Request;

class BuyerController extends Controller
{
    public function index() {
        return view('buyers', [
            "title" => "All buyers",
            "buyers" => Buyer::all()
        ]);
    }
}
