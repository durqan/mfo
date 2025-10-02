<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonalController extends Controller
{
    public function view()
    {
        return view('view', ['title' => 'Личный кабинет', 'component' => 'personal']);
    }
}
