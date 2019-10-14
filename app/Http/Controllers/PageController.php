<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Backpack\MenuCRUD\app\Models\MenuItem;

class PageController extends Controller
{
    //
    public function __construct(){

        $this->menus = MenuItem::getTree();
    }
    
    public function index(Request $request)
    {   
        return view('pages.main');
    }
}
