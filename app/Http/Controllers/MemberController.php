<?php

namespace App\Http\Controllers;

use App\Models\Relative;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class MemberController extends Controller
{
    public function getRegisterParentPage(){
        $relatives = Relative::all();
        return view('registerParent',['relatives'=>$relatives]);

    }

    public function registerParent(Request $request){
        $request->validate([
            'id'=>'required|numeric|max:255',
        ]);
        $member = User::find(Auth::id());
        $member->relative_id = $request->input('id');
        $member->save();

        $relative = $member->relative;

        return view('memberdash', ['relative'=>$relative]);

    }
    //
}
