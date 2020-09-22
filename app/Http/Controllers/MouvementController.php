<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use App\Models\Parcel;
use App\Models\Service;
use App\Models\Personal;
use App\Models\Mouvement;
use App\Model\Preparation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Mouvement_temporary;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class MouvementController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->isMethod('post')) {
            $data = $request->all();
            $this->validate($request, [
                'agenciesdesti_id' => 'required',
                'services_id' => 'required',
                'personals_id' => 'required',
                'date_send' => 'required',
                'preparations_id' => 'required'
            ]);

            $config = ['table' => 'mouvement_temporaries', 'length' => 15, 'prefix' => 'MOUVEMENT-'];
            $id_mouvement = IdGenerator::generate($config);

            $mouvement = new Mouvement_temporary();
            $mouvement->id = $id_mouvement;
            $mouvement->agenciesexpe_id = Auth()->user()->agencies_id;
            $mouvement->agenciesdesti_id = $data['agenciesdesti_id'];
            $mouvement->services_id = $data['services_id'];
            $mouvement->personals_id = $data['personals_id'];
            $mouvement->date_send = $data['date_send'];
            $mouvement->preparations_id = $data['preparations_id'];
            $mouvement->save();

            Preparation::where(['id' => $mouvement->preparations_id])
                ->update([
                    'status' => "envoi"
                ]);
            return redirect()->back()->with('success', 'colis Ajouter tous avec success !');
        }
        $agency = Agency::all()->where('id', '!=', Auth()->user()->agencies_id);
        $agency_dropdown = "<option value=''selected disabled>selected</option>";
        foreach ($agency as $agencie) {
            $agency_dropdown .= "<option value='" . $agencie->id . "'>" . $agencie->name . "</option>";
        }
        $services = Service::all()->where('agencies_id', '==', Auth()->user()->agencies_id);
        $services_dropdown = "<option value=''selected disabled>selected</option>";
        foreach ($services as $service) {
            $services_dropdown .= "<option value='" . $service->id . "'>" . $service->name . "</option>";
        }
        $personals = Personal::all()->where('agencies_id', '==', Auth()->user()->agencies_id);
        $personals_dropdown = "<option value=''selected disabled>selected</option>";
        foreach ($personals as $personal) {
            $personals_dropdown .= "<option value='" . $personal->id . "'>" . $personal->lastname . "</option>";
        }
        $preparation = Preparation::all()->where('status', '==', 'encours');
        $preparation_dropdown = "<option value=''selected disabled>selected</option>";
        foreach ($preparation as $prepare) {
            $preparation_dropdown .= "<option value='" . $prepare->id . "'>" . $prepare->id . "</option>";
        }
        return view('body.mouvements.index')->with([
            'preparation_dropdown' => $preparation_dropdown,
            'agency_dropdown' => $agency_dropdown,
            'services_dropdown' => $services_dropdown,
            'personals_dropdown' => $personals_dropdown,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $mouvement_temporary = Mouvement_temporary::all();

        $agency = Agency::all()->where('id', '!=', Auth()->user()->agencies_id);
        $agency_dropdown = "<option value=''selected disabled>selected</option>";
        foreach ($agency as $agencie) {
            $agency_dropdown .= "<option value='" . $agencie->id . "'>" . $agencie->name . "</option>";
        }
        $services = Service::all()->where('agencies_id', '==', Auth()->user()->agencies_id);
        $services_dropdown = "<option value=''selected disabled>selected</option>";
        foreach ($services as $service) {
            $services_dropdown .= "<option value='" . $service->id . "'>" . $service->name . "</option>";
        }
        $personals = Personal::all()->where('agencies_id', '==', Auth()->user()->agencies_id);
        $personals_dropdown = "<option value=''selected disabled>selected</option>";
        foreach ($personals as $personal) {
            $personals_dropdown .= "<option value='" . $personal->id . "'>" . $personal->lastname . "</option>";
        }
        $preparation = Preparation::all()->where('status', '==', 'encours');
        $preparation_dropdown = "<option value=''selected disabled>selected</option>";
        foreach ($preparation as $prepare) {
            $preparation_dropdown .= "<option value='" . $prepare->id . "'>" . $prepare->id . "</option>";
        }

        $number = 1;
        return view('body.mouvements.liste')->with([
            'number' => $number,
            'mouvement_temporary' => $mouvement_temporary,
            'preparation_dropdown' => $preparation_dropdown,
            'agency_dropdown' => $agency_dropdown,
            'services_dropdown' => $services_dropdown,
            'personals_dropdown' => $personals_dropdown,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edite(Request $request, $id = null)
    {

        if ($request->isMethod('post')) {
            $data = $request->all();
            $this->validate($request, [
                'agenciesdesti_id' => 'required',
                'services_id' => 'required',
                'personals_id' => 'required',
                'date_send' => 'required',
                'preparations_id' => 'required'
            ]);
            Mouvement_temporary::where(['id' => $id])->update([
                'agenciesdesti_id' => $data['agenciesdesti_id'],
                'services_id' => $data['services_id'],
                'personals_id' => $data['personals_id'],
                'date_send' => $data['date_send'],
                'preparations_id' => $data['preparations_id']
            ]);
            return redirect('/liste-mouvement')->with('success', 'colis edite avec success !');
        }
        $mouvement_temporary = Mouvement_temporary::where(['id' => $id])->first();
        $agency = Agency::all()->where('id', '!=', Auth()->user()->agencies_id);
        $services = Service::all()->where('agencies_id', '=', Auth()->user()->agencies_id);
        $personals = Personal::all()->where('agencies_id', '=', Auth()->user()->agencies_id);
        $preparation = Preparation::all()->where('status', '!=', 'final');
        return view('body.mouvements.edite')->with([
            'mouvement_temporary' => $mouvement_temporary,
            'preparation' => $preparation,
            'agency' => $agency,
            'services' => $services,
            'personals' => $personals,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id = null)
    {
        $mouvement_temporary = Mouvement_temporary::where(['id' => $id])->first();
        if ($request->isMethod('post')) {
            $data = $request->all();
            $this->validate($request, [
                'name' => 'required',
                'description' => 'required',
            ]);
            $config1 = ['table' => 'carriers', 'length' => 15, 'prefix' => 'CARRIERS-'];
            $id_carriers = IdGenerator::generate($config1);

            DB::table('carriers')->insert([
                'id' => $id_carriers,
                'name' => $data['name'],
                'description' => $data['description']
            ]);


            $config2 = ['table' => 'mouvements', 'length' => 15, 'prefix' => 'MOUVEMENT-'];
            $id_mouvement = IdGenerator::generate($config2);

            $mouvement = new Mouvement();
            $mouvement->id = $id_mouvement;
            $mouvement->agenciesexpe_id = Auth()->user()->agencies_id;
            $mouvement->agenciesdesti_id = $mouvement_temporary->agenciesdesti_id;
            $mouvement->services_id = $mouvement_temporary->services_id;
            $mouvement->personals_id = $mouvement_temporary->personals_id;
            $mouvement->date_send = $mouvement_temporary->date_send;
            $mouvement->preparations_id = $mouvement_temporary->preparations_id;
            $mouvement->carriers_id = $id_carriers;
            $mouvement->save();

            Preparation::where(['id' => $mouvement->preparations_id])
                ->update([
                    'status' => "final"
                ]);

            return redirect('/liste-mouvement')->with('success', 'colis envoyer avec success !');
        }
        return view('body.mouvements.carrier')->with('mouvement_temporary', $mouvement_temporary);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view($id = null)
    {
        $preparation = Preparation::where('id', $id)->first();
        $parcel = Parcel::all()->where('preparations_id', $id);
        return view('body.mouvements.details')->with(['parcel' => $parcel, 'preparation' => $preparation]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mouvement_temporary::where(['id' => $id])->delete();
        return redirect()->back()->with('error', 'Mouvement Delete');
    }
}
