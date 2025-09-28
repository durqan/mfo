<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function view()
    {
        return view('loan_page');
    }
}
