<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class PersonalController extends Controller
{
    public function view()
    {
        return Inertia::render('app', ['title' => 'Личный кабинет', 'component' => 'personal']);
    }
}
