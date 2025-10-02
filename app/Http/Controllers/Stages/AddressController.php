<?php

namespace App\Http\Controllers\Stages;

use App\Http\Controllers\Controller;
use App\Http\Requests\Stages\AddressFormRequest;
use App\Models\Addresses;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddressController extends Controller
{
    public function add(AddressFormRequest $request)
    {
        $request->validated();
        $status = 200;
        $message = $request->user_id;

        DB::beginTransaction();

        try {
            $user = User::find($request->user_id);
            $addresses = new Addresses();
            $addresses->user_id = $request->user_id;
            $addresses->full = $request->reg_full;
            $addresses->region = $request->reg_region;
            $addresses->city = $request->reg_city;
            $addresses->street = $request->reg_street;
            $addresses->house = $request->reg_house;
            $addresses->room = $request->reg_room;
            $addresses->save();
            $user->reg_addresses_id = $addresses->id;

            $addresses = new Addresses();
            $addresses->user_id = $request->user_id;
            $addresses->full = $request->fakt_full;
            $addresses->region = $request->fakt_region;
            $addresses->city = $request->fakt_city;
            $addresses->street = $request->fakt_street;
            $addresses->house = $request->fakt_house;
            $addresses->room = $request->fakt_room;
            $addresses->save();
            $user->fakt_addresses_id = $addresses->id;

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
