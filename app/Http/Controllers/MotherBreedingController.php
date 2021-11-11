<?php

namespace App\Http\Controllers;

use App\Models\Goat;
use App\Models\MotherBreedingHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MotherBreedingController extends Controller
{
    public function breed(Request $request){

        $user = Auth::user()->id;

        $goatF = Goat::select('goats.*')->join('users', 'goats.user_id', '=', 'users.id')
        ->where('goats.user_id', '=', $user)->where('sex','=','เพศเมีย')->orderBy('goatId')->get();

        $goatM = Goat::select('goats.*')->join('users', 'goats.user_id', '=', 'users.id')
        ->where('goats.user_id', '=', $user)->where('sex','=','เพศผู้')->orderBy('goatId')->get();

        return view('goats.update.breedUpdateMultiple', compact('goatF','goatM'));

    }

    public function updateBreed(Request $request){

        foreach ($request->goat_id as $key=>$goat_id) {
            $request->validate([
                'breedNo.*' => 'required',
                'dateOfBreed.*' => 'required',
                'father_breeder.*' => 'required',
                'goat_id.*' => 'required',
                'breed_staff.*' => 'required'
        ]);

            $breed = new MotherBreedingHistory();
            $breed -> breedNo = $request->breedNo[$key];
            $breed -> dateOfBreed = $request->dateOfBreed[$key];
            $breed -> father_breeder = $request->father_breeder[$key];
            $breed -> breed_staff = $request->breed_staff[$key];
            $breed -> goat_id = $goat_id;

            $breed -> save();
        }
            if ($breed) {
                return back()->with('success', 'You have been successfully goat breeding registered');
            } else {
                return back()->with('fail', 'Something went wrong');
            }

    }
}
