<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('s');
        $products = Product::where('name', 'LIKE', "%{$query}%")->get();
        return view('fe.search.results', compact('products'));
    }
}
