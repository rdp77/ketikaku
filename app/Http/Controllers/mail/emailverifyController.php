<?php

namespace App\Http\Controllers\mail;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Validator;
use DB; 
use Storage;
class emailverifyController extends Controller
{
   

    public function verify($token)
    {
        $user = User::where('u_token',$token)->firstOrFail();
    
        $user->update(['u_token'=>null]);

        return redirect()->route('home')->with('succes','Account verified');

    }
    




}
