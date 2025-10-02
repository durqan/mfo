<?php

namespace App\Http\Controllers\Stages;

use App\Http\Controllers\Controller;
use App\Http\Requests\Stages\ContactsFormRequest;
use App\Http\Requests\Stages\PassportFormRequest;
use App\Models\User;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;

class PassportController extends Controller
{
    public function add(PassportFormRequest $request)
    {
        $request->validated();

        $user = User::find($request->user_id);
        $user->passport_serial = $request->passport_serial;
        $user->passport_number = $request->passport_number;
        $user->issue_date = date('Y-m-d', strtotime($request->issue_date));
        $user->unit_code = $request->unit_code;
        $user->issue = $request->issue;
        $user->birth_place = $request->birth_place;
        $user->save();

        return response($user->id, 200);
    }
}
