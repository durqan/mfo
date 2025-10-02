<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class MainController extends Controller
{
    public function main_page()
    {
        return Inertia::render('app', ['title' => 'Добро пожаловать', 'component' => 'main']);
    }
}
