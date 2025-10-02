<?php

namespace App\Http\Controllers;

use App\Models\LoanReasons;
use Illuminate\Http\Request;

class LoanReasonsController extends Controller
{
    public function gets()
    {
        return LoanReasons::get()->toJson();
    }
}
