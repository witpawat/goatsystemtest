<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use App\Models\Gene;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Vaccine;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function gene(){
        
        return view('admin.createGene');
    }

    public function geneUpdate(Request $request){

            $request->validate([
            'gene_name' => 'required',

        ]);            
            $gene = new Gene();
            $gene -> gene_name = $request->gene_name;
            $gene -> save();

            return redirect()->route('admin.home')->with('success','Gost has been created successfully.');

    }

    public function disease(){
        
        return view('admin.createDisease');
    }

    public function diseaseUpdate(Request $request){

            $request->validate([
            'disease_name' => 'required',

        ]);            
            $gene = new Disease();
            $gene -> disease_name = $request->disease_name;
            $gene -> save();

            return redirect()->route('admin.home')->with('success','Gost has been created successfully.');

    }
    public function vaccine(){
        
        return view('admin.createVaccine');
    }

    public function vaccineUpdate(Request $request){

            $request->validate([
            'vaccine_name' => 'required',

        ]);            
            $gene = new Vaccine();
            $gene -> vaccine_name = $request->vaccine_name;
            $gene -> save();

            return redirect()->route('admin.home')->with('success','Gost has been created successfully.');

        }

    public function destroyGene(Gene $gene,$id)
    {
        $gene = Gene::find($id);
        $gene->delete();

        return redirect()->route('admin.home')
                        ->with('success','Goat has been deleted successfully');
    }

    public function destroyDisease(Disease $disease,$id)
    {
        $disease = Disease::find($id);
        $disease->delete();

        return redirect()->route('admin.home')
                        ->with('success','Goat has been deleted successfully');
    }

    public function destroyVaccine(Vaccine $vaccine,$id)
    {
        $vaccine = Vaccine::find($id);
        $vaccine->delete();

        return redirect()->route('admin.home')
                        ->with('success','Goat has been deleted successfully');
    }


}
