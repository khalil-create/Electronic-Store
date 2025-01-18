<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Exception;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        // alert('مرحبا بك في المدونة!')->autoclose(3000);
    }

    public function index()
    {
        try {
            $items = Item::orderBy('id', 'DESC')->paginate(config('constants.perPage'));
            $categories = Category::get();
            return view('home', compact('items', 'categories'));
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}
