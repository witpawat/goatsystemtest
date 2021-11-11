<?php

namespace App\Http\Controllers;

use App\Models\Goat;
use App\Models\HealthHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HealthHistoryController extends Controller
{
    public function health(Request $request)
    {
        $user = Auth::user()->id;

        $goats = Goat::select('goats.*')->join('users', 'goats.user_id', '=', 'users.id')
        ->where('goats.user_id', '=', $user)->orderBy('goatId')->get();

        return view('goats.update.healthUpdateMultiple', compact('goats'));

    }


    public function healthUpdate(Request $request){
        
        foreach($request->goat_id as $key=>$goat_id){
            $request->validate([
                'attitude.*' => 'required',
                'dateOfHealth.*' => 'required',
                'health_staff.*' => 'required',
                'goat_id.*' => 'required'
            ]);
    
                $health = new HealthHistory();
                $health -> goat_id = $goat_id;
                $health -> attitude = $request->attitude[$key];
                $health -> dateOfHealth = $request->dateOfHealth[$key];
                $health -> health_staff = $request->health_staff[$key];                
    
                $health -> save();
        }
            if ($health) {
                return redirect()->route('goats.multiHealth')->with('success', 'You have been successfully');
            } else {
                return redirect()->route('goats.multiHealth')->with('fail', 'Something went wrong');
            }

    }
}
