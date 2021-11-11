<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use App\Models\Goat;
use App\Models\MedicalExamination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MedicalExaminationController extends Controller
{
    public function medical(Request $request){
        
        $user = Auth::user()->id;

        $goats = Goat::select('goats.*')->join('users', 'goats.user_id', '=', 'users.id')
        ->where('goats.user_id', '=', $user)->orderBy('goatId')->get();

        $dis = Disease::select('diseases.*')->orderBy('id')->get();

        return view('goats.update.medicalUpdateMultiple', compact('goats','dis'));

    }

    public function medicalUpdate(Request $request){

        
        foreach ($request->goat_id as $key=>$goat_id) {
            $request->validate([
                'typeOfDisease.*' => 'required',
                'dateExamination.*' => 'required',
                'result.*' => 'required',
                'goat_id.*' => 'required'
            ]);

            $medical = new MedicalExamination();
            $medical -> typeOfDisease = $request->typeOfDisease[$key];
            $medical -> dateExamination = $request->dateExamination[$key];
            $medical -> result = $request->result[$key];
            $medical -> goat_id = $goat_id;

            $medical -> save();
        }
        if ($medical) {
            return back()->with('success', 'You have been successfully');
        } else {
            return back()->with('fail', 'Something went wrong');
        }

    }
}
