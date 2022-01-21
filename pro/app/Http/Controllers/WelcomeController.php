<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Type;
use App\Menu;

class WelcomeController extends Controller
{
    public function index()
    {
        $types = Type::all();

        $menus = Menu::with('type')->get();

        return view('welcome', compact('types', 'menus'));
    }
}
