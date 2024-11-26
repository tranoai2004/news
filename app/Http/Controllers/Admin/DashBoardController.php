<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    public function index()
    {
        $userCount = User::count();
        $categoryCount = Category::count();
        $productCount = Product::count();
        $contactCount = Contact::count();
        return view('admin.index', compact('userCount', 'categoryCount', 'productCount', 'contactCount'));
    }
}
