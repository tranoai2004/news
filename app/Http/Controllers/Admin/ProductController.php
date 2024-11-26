<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $products = $query->paginate(10);

        return view("admin.product.index", compact("products"));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view("admin.product.create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request->all());
        $fileName = $request->photo->getClientOriginalName();
        $request->photo->storeAs("public/images", $fileName);
        $request->merge(['image' => $fileName]);
        try {
            $product = Product::create($request->all());
            return redirect()->route('product.index')->with('success', 'Product created successfully.');
        } catch (\Throwable $th) {
            // dd($th->getMessage());
            return redirect()->back()->withErrors(['error' => 'An error occurred while creating the product.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.product.edit', compact('product', 'categories'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:100',
            'tomtat' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'category_id' => 'required|exists:categories,id',
            'slug' => 'required|string|max:100|unique:products,slug,' . $id,
            'description' => 'nullable|string',
        ]);

        $product = Product::findOrFail($id);

        if ($request->hasFile('photo')) {
            $fileName = $request->photo->getClientOriginalName();
            $request->photo->storeAs("public/images", $fileName);
            $product->image = $fileName;
        }

        $product->name = $request->input('name');
        $product->tomtat = $request->input('tomtat');
        $product->category_id = $request->input('category_id');
        $product->slug = $request->input('slug');
        $product->description = $request->input('description');

        try {
            $product->save();
            return redirect()->route('product.index')->with('success', 'Product updated successfully.');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->withErrors(['error' => 'An error occurred while updating the product.']);
        }
    }





    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            $product->delete();
            return redirect()->route('product.index')->with('success', 'Xóa Thành Công');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Xóa Thất Bại');
        }
    }
}
