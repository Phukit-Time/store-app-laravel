<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class StoreController extends Controller
{
    public function addItem(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer'
        ]);
    
        // Check if an item with the same name already exists
        $existingItem = Item::where('name', $request->name)->first();
    
        if ($existingItem) {
            // If the item already exists, update its quantity
            $existingItem->increment('quantity', $request->quantity);
            // Return a response indicating that the quantity has been added
            return redirect('/');        } else {
            // If the item does not exist, create a new item
            $item = Item::create([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'quantity' => $request->quantity
            ]);
            // Return a response indicating that a new item has been created
            return redirect('/');        }
    }

    public function index()
    {
        $items = Item::all(); // Retrieve all items from the database
        return view('welcome', ['items' => $items]); // Pass items to the view
    }

    public function sellItem(Request $request, $itemId)
    {
        // Find the item by its ID
        $item = Item::findOrFail($itemId);
    
        // Validate the incoming request data
        $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $item->quantity
        ]);
    
        // Update the quantity of the item
        $item->decrement('quantity', $request->quantity);
    
        // Return a response
        return redirect('/');
    }
}