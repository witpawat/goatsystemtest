<?php

namespace App\Http\Controllers;

use App\Models\Goat;
use App\Models\WeightUpdate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WeightUpdateController extends Controller
{
    public function weight(Request $request){

        $user = Auth::user()->id;

        $goats = Goat::select('goats.*')->join('users', 'goats.user_id', '=', 'users.id')
        ->where('goats.user_id', '=', $user)->orderBy('goatId')->get();

        return view('goats.update.weightUpdateMultiple', compact('goats'));
    }

    public function updateWeight(Request $request){

        foreach ($request->goat_id as $key=>$goat_id) {
            $request->validate([
            'timePeriod.*' => 'required',
            'weight.*' => 'required',
            'goat_id.*' => 'required'
        ]);

            $weight = new WeightUpdate();
            $weight -> goat_id = $goat_id;
            $weight -> timePeriod = $request->timePeriod[$key];
            $weight -> weight = $request->weight[$key];            

            $weight -> save();
        }            
            if ($weight) {
                return redirect()->route('goats.multiWeight')->with('success', 'You have been successfully');
            } else {
                return redirect()->route('goats.multiWeight')->with('fail', 'Something went wrong');
            }

    }
}
