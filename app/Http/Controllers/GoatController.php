<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use App\Models\Gene;
use App\Models\Goat;
use App\Models\HealthHistory;
use App\Models\MedicalExamination;
use App\Models\MotherBreedingHistory;
use App\Models\User;
use App\Models\VaccinationHistory;
use App\Models\Vaccine;
use App\Models\WeightUpdate;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class GoatController extends Controller
{
    public function index(){

        $user = Auth::user()->id;
        $data['goats'] = DB::table('goats')
        ->select('goats.*')
        ->join('users', 'goats.user_id', '=', 'users.id')
        ->where('goats.user_id', '=', $user)
        ->orderBy('goatId','asc')->paginate(5);
        return view('goats.index', $data);

    }

    public function create(){
        $gene = Gene::orderBy('id')->get();
        return view('goats.create',compact('gene'));
    }

    public function search(Request $request){
        $search = $request->get('search');
        $user = Auth::user()->id;
        $goats = DB::table('goats')
        ->select('goats.*')
        ->join('users', 'goats.user_id', '=', 'users.id')
        ->where('goats.user_id', '=', $user)
        ->where('goats.goatId', 'like', '%'.$search.'%')->paginate(5);
        return view('goats.index', ['goats' => $goats]);
    }

    public function store(Request $request){

            $request->validate([
            'goatId' => 'required',
            'goatName' => 'required',
            'sex' => 'required',
            'gene' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'colour' => 'required',
            'dateOfBirth' => 'required',
            'weightOfBirth' => 'required',
            'arrivalDate' => 'required',
            'fatherId' => 'required',
            'fatherGoatName' => 'required',
            'fatherGene' => 'required',
            'motherId' => 'required',
            'motherGoatName' => 'required',
            'motherGene' => 'required',

        ]);
            $path = $request->file('image')->store('public/goatimages');
            $goat = new Goat;
            $goat -> goatId = $request->goatId;
            $goat -> goatName = $request->goatName;
            $goat -> sex = $request->sex;
            $goat -> gene = $request->gene;
            $goat -> image = $path;
            $goat -> colour = $request->colour;
            $goat -> dateOfBirth = $request->dateOfBirth;
            $goat -> weightOfBirth = $request->weightOfBirth;
            $goat -> arrivalDate = $request->arrivalDate;
            $goat -> fatherId = $request->fatherId;
            $goat -> fatherGoatName = $request->fatherGoatName;
            $goat -> fatherGene = $request->fatherGene;
            $goat -> motherId = $request->motherId;
            $goat -> motherGoatName = $request->motherGoatName;
            $goat -> motherGene = $request->motherGene;
            $goat -> user_id = Auth::user()->id;
            $goat -> save();

            return redirect()->route('goats.index')->with('success','Gost has been created successfully.');

        }

    public function show($goatId){
        $user = Auth::user()->id;
        $goats = DB::table('goats')
        ->select('*')
        ->join('users', 'goats.user_id', '=', 'users.id')
        ->where('goats.user_id', '=', $user)
        ->where('goats.goatId', '=', [$goatId])
        ->get();

        $health = DB::table('goats')
        ->select('health_histories.*')
        ->join('health_histories', 'goats.goatId', '=', 'health_histories.goat_id')
        ->where('goats.goatId', '=', [$goatId])
        ->where('health_histories.goat_id', '=', [$goatId])
        ->get();

        $medical = DB::table('goats')
        ->select('medical_examinations.*')
        ->join('medical_examinations', 'goats.goatId', '=', 'medical_examinations.goat_id')
        ->where('goats.goatId', '=', [$goatId])
        ->where('medical_examinations.goat_id', '=', [$goatId])
        ->get();

        $breeding = DB::table('goats')
        ->select('mother_breeding_histories.*')
        ->join('mother_breeding_histories', 'goats.goatId', '=', 'mother_breeding_histories.goat_id')
        ->where('goats.goatId', '=', [$goatId])
        ->where('mother_breeding_histories.goat_id', '=', [$goatId])
        ->get();

        $vaccination = DB::table('goats')
        ->select('vaccination_histories.*')
        ->join('vaccination_histories', 'goats.goatId', '=', 'vaccination_histories.goat_id')
        ->where('goats.goatId', '=', [$goatId])
        ->where('vaccination_histories.goat_id', '=', [$goatId])
        ->get();

        $weight = DB::table('goats')
        ->select('weight_updates.*')
        ->join('weight_updates', 'goats.goatId', '=', 'weight_updates.goat_id')
        ->where('goats.goatId', '=', [$goatId])
        ->where('weight_updates.goat_id', '=', [$goatId])
        ->get();

        return view('goats.show', compact('goats','health','medical','breeding','vaccination','weight'));
    }

    public function edit(Goat $goat)
    {
        $gene = Gene::orderBy('id')->get();
        return view('goats.edit',compact('goat','gene'));
    }

    public function update(Request $request, $goatId)
    {
        $request->validate([
            'goatId' => 'required',
            'goatName' => 'required',
            'sex' => 'required',
            'gene' => 'required',
            'colour' => 'required',
            'dateOfBirth' => 'required',
            'weightOfBirth' => 'required',
            'arrivalDate' => 'required',
            'fatherId' => 'required',
            'fatherGoatName' => 'required',
            'fatherGene' => 'required',
            'motherId' => 'required',
            'motherGoatName' => 'required',
            'motherGene' => 'required',
        ]);

        $goat = Goat::find($goatId);
        if($request->hasFile('image')){
            $request->validate([
              'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $path = $request->file('image')->store('public/goatimages');
            $goat->image = $path;
        }
            $goat -> goatId = $request->goatId;
            $goat -> goatName = $request->goatName;
            $goat -> sex = $request->sex;
            $goat -> gene = $request->gene;
            $goat -> colour = $request->colour;
            $goat -> dateOfBirth = $request->dateOfBirth;
            $goat -> weightOfBirth = $request->weightOfBirth;
            $goat -> arrivalDate = $request->arrivalDate;
            $goat -> fatherId = $request->fatherId;
            $goat -> fatherGoatName = $request->fatherGoatName;
            $goat -> fatherGene = $request->fatherGene;
            $goat -> motherId = $request->motherId;
            $goat -> motherGoatName = $request->motherGoatName;
            $goat -> motherGene = $request->motherGene;
            $goat -> user_id = Auth::user()->id;
            $goat->save();

        return redirect()->route('goats.index')
                        ->with('success','Gost updated successfully');
    }

    public function destroy(Goat $goat)
    {
        $goat->delete();

        return redirect()->route('goats.index')
                        ->with('success','Goat has been deleted successfully');
    }

    public function deleteAll(Request $request){
        $ids = $request->get('ids');
        $dbs = DB::table('goats')->whereIn('goatId', $ids)->delete();
        return redirect()->route('goats.index');
    }

    public function homeUpdateMultiple(){
        return  view('goats.updateMultipleHome');
    }

    public function homeUpdate($goatId)
    {
        $goat = Goat::find($goatId);

        return view('goats.updateHome', compact('goat'));

    }

    public function health($goatId)
    {
        $goat = Goat::find($goatId);

        return view('goats.update.healthUpdate', compact('goat'));
    }

    public function healthUpdate(Request $request, $goatId){

        $request->validate([
            'attitude' => 'required',
            'dateOfHealth' => 'required',
            'health_staff' => 'required',
            'goat_id' => 'required'
        ]);

            $health = Goat::find($goatId);
            $health = new HealthHistory();
            $health -> attitude = $request->attitude;
            $health -> dateOfHealth = $request->dateOfHealth;
            $health -> health_staff = $request->health_staff;
            $health -> goat_id = $request->goat_id;

            $health -> save();

            if ($health) {
                return back()->with('success', 'You have been successfully');
            } else {
                return back()->with('fail', 'Something went wrong');
            }

    }

    public function weight($goatId){

        $goat = Goat::find($goatId);

        return view('goats.update.weightUpdate', compact('goat'));
    }

    public function updateWeight(Request $request, $goatId){
        $request->validate([
            'timePeriod' => 'required',
            'weight' => 'required',
            'goat_id' => 'required'
        ]);

        $weight = Goat::find($goatId);
        $weight = new WeightUpdate();
        $weight -> timePeriod = $request->timePeriod;
        $weight -> weight = $request->weight;
        $weight -> goat_id = $request->goat_id;

        $weight -> save();

        if ($weight) {
            return back()->with('success', 'You have been successfully');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }

    public function medical($goatId){

        $goat = Goat::find($goatId);
        $dis = Disease::select('diseases.*')->orderBy('id')->get();

        return view('goats.update.medicalUpdate', compact('goat','dis'));

    }

    public function medicalUpdate(Request $request, $goatId){

        $request->validate([
            'typeOfDisease' => 'required',
            'dateExamination' => 'required',
            'result' => 'required',
            'goat_id' => 'required'
        ]);

            $medical = Goat::find($goatId);
            $medical = new MedicalExamination();
            $medical -> typeOfDisease = $request->typeOfDisease;
            $medical -> dateExamination = $request->dateExamination;
            $medical -> result = $request->result;
            $medical -> goat_id = $request->goat_id;

            $medical -> save();

            if ($medical) {
                return back()->with('success', 'You have been successfully');
            } else {
                return back()->with('fail', 'Something went wrong');
            }

    }

    public function vaccination($goatId){

        $goat = Goat::find($goatId);
        $vac = Vaccine::orderBy('id')->get();

        return view('goats.update.vaccineUpdate', compact('goat','vac'));

    }

    public function vaccineUpdate(Request $request, $goatId){

                $request->validate([
                    'typeOfVaccine' => 'required',
                    'dateOfVaccine' => 'required',
                    'vaccine_staff' => 'required',
                    'goat_id' => 'required'
                ]);

                $vaccine = Goat::find($goatId);
                $vaccine = new VaccinationHistory();
                $vaccine -> typeOfVaccine = $request->typeOfVaccine;
                $vaccine -> dateOfVaccine = $request->dateOfVaccine;
                $vaccine -> vaccine_staff = $request->vaccine_staff;
                $vaccine -> goat_id = $request->goat_id;

                $vaccine -> save();

            if ($vaccine) {
                return back()->with('success', 'You have been successfully');
            } else {
                return back()->with('fail', 'Something went wrong');
            }

    }

    public function breed($goatId){

        $goat = Goat::find($goatId);

        $user = Auth::user()->id;

        $goatF = Goat::select('goats.*')->join('users', 'goats.user_id', '=', 'users.id')
        ->where('goats.user_id', '=', $user)->where('sex','=','เพศเมีย')->orderBy('goatId')->get();

        $goatM = Goat::select('goats.*')->join('users', 'goats.user_id', '=', 'users.id')
        ->where('goats.user_id', '=', $user)->where('sex','=','เพศผู้')->orderBy('goatId')->get();

        return view('goats.update.breedUpdate', compact('goat','goatF','goatM'));

    }

    public function updateBreed(Request $request, $goatId){

        $request->validate([
            'breedNo' => 'required',
            'dateOfBreed' => 'required',
            'father_breeder' => 'required',
            'goat_id' => 'required',
            'breed_staff' => 'required'
        ]);

            $breed = Goat::find($goatId);
            $breed = new MotherBreedingHistory();
            $breed -> breedNo = $request->breedNo;
            $breed -> dateOfBreed = $request->dateOfBreed;
            $breed -> father_breeder = $request->father_breeder;
            $breed -> breed_staff = $request->breed_staff;
            $breed -> goat_id = $request->goat_id;

            $breed -> save();

            if ($breed) {
                return back()->with('success', 'You have been successfully goat breeding registered');
            } else {
                return back()->with('fail', 'Something went wrong');
            }

    }

    public function generate($goatId)
    {
        $goat = Goat::find($goatId);
        return view('goats.qrcode',compact('goat'));
    }

    public function downloadQRCode (Request $request, $goatId)
    {
        $goat = Goat::findOrFail($goatId);
        $imageName  = 'qr-code'.$goatId;
        $headers    = array('Content-Type' => ['png','svg','eps']);
        $type       = $request->qr_type == 'jpg' || $request->qr_type == 'transparent' ? 'png' : $request->qr_type;
        $image      = QrCode::format($type)
                    ->size(200)->errorCorrection('H')
                    ->generate( route('goats.updateHome',$goat->goatId));

        Storage::disk('public')->put($imageName, $image);

        if ($request->qr_type == 'jpg') {
            $type = 'jpg';
            $image = imagecreatefrompng('storage/'.$imageName);
            imagejpeg($image, 'storage/'.$imageName, 100);
            imagedestroy($image);
        }

        return response()->download('storage/'.$imageName, $imageName.'.'.$type, $headers)->deleteFileAfterSend();
    }

}
