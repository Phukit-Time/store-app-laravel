<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Item;


class SaleController extends Controller
{
    public function index()
    {
        $items = Item::all(); // Retrieve all items from the database
        return view('salePage', ['items' => $items]); // Pass items to the view
    }

    public function addSale(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'lineItemId' => 'required|integer'
        ]);
    }
}
