<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use App\Models\Gene;
use App\Models\Vaccine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    
    public function adminHome()
    {
        $user = Auth::user()->id; 
        
        $gene = Gene::orderBy('id')->get();

        $vac = Vaccine::orderBy('id')->get();

        $disease = Disease::orderBy('id')->get();
        
        
        return view('adminHome',compact('gene','vac','disease'));
    }
}