<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
    }

    public function editprofile()
    {
    	$user = User::find(Auth::user()->id);    
        return view('users.editProfile',compact('user'));
    }

    public function saveeditprofile(Request $input){

        $this->validate($input, [
        'fname' => 'required|max:255',
        'lname' => 'required|max:255',
        'farmName' => 'required|max:255'      
            ]);

    	$user = User::find(Auth::user()->id);
    	$user->fname = $input["fname"];
        $user->lname = $input["lname"];
        $user->farmName = $input["farmName"];
    	$user->save();    	  	

    	return redirect('edit-profile');

    }

    public function store(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required', 'string', 'min:8'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
   
        return back('Password change successfully.');

        return redirect()->back()->withInput(['tab' => 'change_password']);
    }

    
}
