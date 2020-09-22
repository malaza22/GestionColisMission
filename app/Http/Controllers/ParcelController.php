<?php

namespace App\Http\Controllers;


use App\Models\Agency;
use App\Models\Parcel;
use App\Models\Product;
use App\Models\Service;
use App\Models\Personal;
use App\Models\Mouvement;
use App\Models\Packaging;
use App\Model\Preparation;
use DB;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class ParcelController extends Controller
{
    public function index()
    {
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request, $id = null)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $this->validate($request, [
                'products_id' => 'required',
                'quantity_products' => ['required', 'max:7'],
            ]);

            foreach ($data['products_id'] as $key => $val) {
                if (!empty($val)) {
                    $config = ['table' => 'parcels', 'length' => 10, 'prefix' => 'PARCEL-'];
                    $id_parcles = IdGenerator::generate($config);
                    $parcel = new Parcel;
                    $parcel->id = $id_parcles;
                    $parcel->preparations_id = $id;
                    $parcel->products_id = $data['products_id'][$key];
                    $parcel->quantity_products = $data['quantity_products'][$key];
                    $parcel->packagings_id = $data['packagings_id'][$key];
                    $parcel->quantity_packagings = $data['quantity_packagings'][$key];
                    $parcel->save();
                }
            }
            return redirect()->back()->with('success', 'colis Ajouter tous avec success !');
        }

        $product = Product::all()->where('agencies_id', '=', Auth()->user()->agencies_id);
        $product_dropdown = "<option value=''selected disabled>selected</option>";
        foreach ($product as $products) {
            $product_dropdown .= "<option value='" . $products->id . "'>" . $products->name . "</option>";
        }
        $packaging = Packaging::all();
        $packaging_dropdown = "<option value=''selected disabled>selected</option>";
        foreach ($packaging as $packagings) {
            $packaging_dropdown .= "<option value='" . $packagings->id . "'>" . $packagings->name . "</option>";
        }

        $parcel = Parcel::where(['preparations_id' => $id])->get();
        $preparation = Preparation::where(['id' => $id])->first();

        return view('body.parcels.index')->with([
            'parcel' => $parcel,
            'preparation' => $preparation,
            'product_dropdown' => $product_dropdown,
            'packaging_dropdown' => $packaging_dropdown
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $this->validate($request, [
                'agenciesexpe_id' => 'required',
                'services_id' => 'required',
                'personals_id' => 'required',
                'date_send' => 'required',
            ]);

            $config = ['table' => 'mouvements', 'length' => 15, 'prefix' => 'MOUVEMENT-'];
            $id_mouvement = IdGenerator::generate($config);

            $mouvement = new Mouvement();
            $test = $mouvement->id = $id_mouvement;
            $mouvement->agenciesdesti_id = Auth()->user()->agencies_id;
            $mouvement->agenciesexpe_id = $data['agenciesexpe_id'];
            $mouvement->services_id = $data['services_id'];
            $mouvement->personals_id = $data['personals_id'];
            $mouvement->date_send = $data['date_send'];
            $mouvement->save();
            return redirect('/create-preparation/' . $test)->with('success', 'colis Ajouter tous avec success !');
        }
        $agency = Agency::all()->where('id', '!=', Auth()->user()->agencies_id);;
        $agency_dropdown = "<option value=''selected disabled>selected</option>";
        foreach ($agency as $agencie) {
            $agency_dropdown .= "<option value='" . $agencie->id . "'>" . $agencie->name . "</option>";
        }
        $services = Service::all()->where('agencies_id', '=', Auth()->user()->agencies_id);
        $services_dropdown = "<option value=''selected disabled>selected</option>";
        foreach ($services as $service) {
            $services_dropdown .= "<option value='" . $service->id . "'>" . $service->name . "</option>";
        }
        $personals = Personal::all()->where('agencies_id', '=', Auth()->user()->agencies_id);
        $personals_dropdown = "<option value=''selected disabled>selected</option>";
        foreach ($personals as $personal) {
            $personals_dropdown .= "<option value='" . $personal->id . "'>" . $personal->lastname . "</option>";
        }

        $parcel = Parcel::all();
        $mouvements = Mouvement::where('status', '=', '0')->first();
        return view('body.parcels.create')->with([
            'parcel' => $parcel,
            'mouvements' => $mouvements,
            'agency_dropdown' => $agency_dropdown,
            'services_dropdown' => $services_dropdown,
            'personals_dropdown' => $personals_dropdown,
        ]);
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id = null)
    {
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
                'products_id' => 'required',
                'quantity_products' => ['required', 'max:7'],
            ]);
           Parcel::where(['id' => $id])->update([
                'products_id' => $data['products_id'],
                'quantity_products' => $data['quantity_products'],
                'packagings_id' => $data['packagings_id'],
                'quantity_packagings' => $data['quantity_packagings'],
            ]);
            $parcel = Parcel::where(['id' => $id])->first();
            return redirect('/add-preparation/'.$parcel->preparations_id)->with('success', 'Colis bien edite');
        }
        $parcel = Parcel::where(['id' => $id])->first();

        $product = Product::all()->where('agencies_id', '=', Auth()->user()->agencies_id);
        $product_dropdown = "<option value=''selected disabled>selected</option>";
        foreach ($product as $products) {
            $product_dropdown .= "<option value='" . $products->id . "'>" . $products->name . "</option>";
        }
        $packaging = Packaging::all();
        $packaging_dropdown = "<option value=''selected disabled>selected</option>";
        foreach ($packaging as $packagings) {
            $packaging_dropdown .= "<option value='" . $packagings->id . "'>" . $packagings->name . "</option>";
        }

        return view('body.parcels.editeparcel')->with([
            'parcel' => $parcel,
            'product'=>$product,
            'packaging' => $packaging
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Parcel::where(['id' => $id])->delete();
        return redirect()->back()->with('error', 'Parcel Delete');
    }
}
