<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Category::query();

        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $categories = $query->get();

        return view("admin.category.index", compact("categories"));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view("admin.category.create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        // dd($request->all());
        try {
            Category::create($request->all());
            return redirect()->route('category.index')->with('success', 'Thêm Mới Thành Công');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Thêm Mới Thất Bại: ' . $th->getMessage());
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
    public function edit(Category $category)
    {
        $categories = Category::all();
        return view('admin.category.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        // dd($request->all());
        try {
            $category->update($request->all());
            return redirect()->route('category.index')->with('success', 'Cập Nhật Thành Công');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Cập Nhật Thất Bại');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return redirect()->route('category.index')->with('success', 'Xóa Thành Công');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Xóa Thất Bại');
        }
    }

    public function trash()
    {
        $categories = Category::onlyTrashed()->get();
        return view('admin.category.trash', compact('categories'));
    }


    public function restore($id)
    {
        Category::withTrashed()->where('id', $id)->restore();
        return redirect()->route('category.index')->with('success', 'Khôi Phục Thành Công');
    }

    public function forceDelete($id)
    {
        Category::withTrashed()->where('id', $id)->forceDelete();
        return redirect()->route('category.trash')->with('success', 'Xóa Vĩnh Viễn Thành Công');
    }
}
