<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function main_page()
    {
        return view('view', ['title' => 'Добро пожаловать', 'component' => 'main']);
    }
}
