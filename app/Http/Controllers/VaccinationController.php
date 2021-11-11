<?php

namespace App\Http\Controllers;

use App\Models\Goat;
use App\Models\VaccinationHistory;
use App\Models\Vaccine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VaccinationController extends Controller
{
    public function vaccination(){
        $user = Auth::user()->id;

        $goats = Goat::select('goats.*')->join('users', 'goats.user_id', '=', 'users.id')
        ->where('goats.user_id', '=', $user)->orderBy('goatId')->get();

        $vac = Vaccine::orderBy('id')->get();

        return view('goats.update.vaccineUpdateMultiple', compact('goats','vac'));

    }

    public function vaccineUpdate(Request $request){


            foreach($request->goat_id as $key=>$goat_id){
                $request->validate([
                    'typeOfVaccine.*' => 'required',
                    'dateOfVaccine.*' => 'required',
                    'vaccine_staff.*' => 'required',
                    'goat_id.*' => 'required'
                ]);

                $vaccine = new VaccinationHistory();
                $vaccine -> goat_id = $goat_id;
                $vaccine -> typeOfVaccine = $request->typeOfVaccine[$key];
                $vaccine -> dateOfVaccine = $request->dateOfVaccine[$key];
                $vaccine -> vaccine_staff = $request->vaccine_staff[$key];

                $vaccine -> save();
            }

            if ($vaccine) {
                return redirect()->route('goats.multiVaccination')->with('success', 'You have been successfully');
            } else {
                return redirect()->route('goats.multiVaccination')->with('fail', 'Something went wrong');
            }

    }
}
