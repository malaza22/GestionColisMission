<?php

namespace App\Http\Controllers;

use App\Models\Parcel;
use App\Models\Personal;
use App\Model\Preparation;
use Illuminate\Http\Request;
use App\Repositories\ListeRepository;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class PreparationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $preparation;

    public function __construct(ListeRepository $preparation_listes)
    {
        $this->preparation = $preparation_listes;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $this->validate($request, [
                'personals_id' => 'required',
                'date_preparation' => 'required',
            ]);
            $config = ['table' => 'preparations', 'length' => 10, 'prefix' => 'PREPA-'];
            $id_preparation = IdGenerator::generate($config);
            $preparation = new Preparation();
            $preparation->id = $id_preparation;
            $preparation->agencies_id = Auth()->user()->agencies_id;
            $preparation->personals_id = $data['personals_id'];
            $preparation->date_preparation = $data['date_preparation'];
            $preparation->save();
            return redirect('/add-preparation/' . $id_preparation)->with('success', 'la continue de preparation avec success !');
        }
        $personals = Personal::all()->where('agencies_id', '=', Auth()->user()->agencies_id);
        $personals_dropdown = "<option value=''selected disabled>selected</option>";
        foreach ($personals as $personal) {
            $personals_dropdown .= "<option value='" . $personal->id . "'>" . $personal->lastname . "</option>";
        }
        return view('body.parcels.add')->with('personals_dropdown', $personals_dropdown);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show(Request $request)
    {
        $listeprepa = $this->preparation->liste_preparation(10,"final");
        // $preparation = Preparation::all()->where('agencies_id', '=', Auth()->user()->agencies_id)->where('status', '!=', 'final');
        $personals = Personal::all()->where('agencies_id', '=', Auth()->user()->agencies_id);

        $personals_dropdown = "<option value=''selected disabled>selected</option>";
        foreach ($personals as $personal) {
            $personals_dropdown .= "<option value='" . $personal->id . "'>" . $personal->lastname . "</option>";
        }

        // $preparations = Preparation::where(['id'=>$request->preid])->first();
        $parcel = Parcel::all();
        return view('body.parcels.liste')->with([
            'parcel'=>$parcel,
            // 'preparation' => $preparation,
            // 'preparations' => $preparations,
            'personals' => $personals,
            'listeprepa' => $listeprepa,
            'personals_dropdown' => $personals_dropdown
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
                'personals_id' => 'required',
                'date_preparation' => 'required',
            ]);
            Preparation::where(['id' => $id])->update([
                'personals_id' => $data['personals_id'],
                'date_preparation' => $data['date_preparation'],
            ]);
            return redirect('/liste-preparation')->with('success', 'Preparation bien modifier');
        }

        $listepre = $this->preparation->liste_preparation(10, 'final');

        $preparation = Preparation::where(['id' => $id])->first();
        $preparations = Preparation::all();
        $personals = Personal::all()->where('agencies_id', '=', Auth()->user()->agencies_id);
        $personals_dropdown = "<option value=''selected disabled>selected</option>";
        foreach ($personals as $personal) {
            $personals_dropdown .= "<option value='" . $personal->id . "'>" . $personal->lastname . "</option>";
        }
        return view('body.parcels.editepreparation')->with([
            'listepre' => $listepre,
            'preparation' => $preparation,
            'preparations' => $preparations,
            'personals' => $personals,
            'personals_dropdown' => $personals_dropdown
        ]);
    }

    public function view($id)
    {
        $preparation = Preparation::where('id', $id)->first();
        $parcel = Parcel::all()->where('preparations_id', $id);
        return view('body.parcels.detail')->with([
            'parcel' => $parcel,
             'preparation' => $preparation
             ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $preparation = Preparation::findOrFail($request->id);
        $preparation->update($request->all());
        return back()->with('success', 'Personnel update successfully !');

        // dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $preparation = Preparation::findOrFail($request->id);
        $preparation->delete();
        return back()->with('error', 'Preparation bien Delete');
    }
}
