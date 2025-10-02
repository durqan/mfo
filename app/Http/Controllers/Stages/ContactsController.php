<?php

namespace App\Http\Controllers\Stages;

use App\Http\Controllers\Controller;
use App\Http\Requests\Stages\ContactsFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ContactsController extends Controller
{
    public function add(ContactsFormRequest $request)
    {
        $request->validated();

        $user = new User();
        $user->lastname = $request->lastname;
        $user->firstname = $request->firstname;
        $user->patronymic = $request->patronymic;
        $user->birth_date = date('Y-m-d', strtotime($request->birth_date));
        $user->sex = $request->sex;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();

        return response($user->id, 200);
    }
}
