<?php

namespace App\Http\Controllers;

use App\Models\CategorySands;
use App\Models\Promotion;
use App\Models\SandsMenu;
use Illuminate\Http\Request;

class SandsMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('sands.index');
    }

    public function sandsPublic(Request $request)
    {
         // $categoryId = $request->get('category', 1);
         $keyword = $request->get('q', null);
         $menus = SandsMenu::all();
         $promotions = Promotion::where('status', true)->get();
        //  $categories = CategorySands::with(['menus'])->get();
         $categories = CategorySands::with(['menus' => function($q) use ($keyword) {
             $q->where('main_title', 'LIKE', "%$keyword%");
         }])
         ->whereHas('menus', function($q) use ($keyword) {
             $q->where('main_title', 'LIKE', "%$keyword%");
         })
         ->get();

         return view('menu.sands.public', compact('menus', 'categories', 'keyword', 'promotions'));
    }
}
