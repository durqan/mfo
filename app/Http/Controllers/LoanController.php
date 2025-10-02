<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddLoanFormRequest;
use App\Models\Addresses;
use App\Models\LoanReasons;
use App\Models\Loans;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class LoanController extends Controller
{
    public function view()
    {
        return Inertia::render('app', ['title' => 'Заявка', 'component' => 'loan']);
    }
    public function add(AddLoanFormRequest $request)
    {
        $request->validated();

        $status = 200;
        $message = 'success';

        DB::beginTransaction();

        try {
            $loan = new Loans();
            $loan->user_id = $request->user_id;
            $loan->reason_id = $request->reason_id;
            $loan->sum = $request->sum;
            $loan->days = $request->days;
            $loan->save();

            $user = User::find($request->user_id);
            $user->password = Hash::make($request->user_id);
            $user->save();

            DB::commit();
        }catch (\Exception $e){
            $status = 500;
            $message = $e->getMessage();
            DB::rollBack();
        }

        return response($message, $status);
    }
}
