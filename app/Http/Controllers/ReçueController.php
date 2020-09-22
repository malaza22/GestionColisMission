<?php

namespace App\Http\Controllers;

use App\Models\Parcel;
use App\Models\Mouvement;
use Illuminate\Http\Request;
use App\Repositories\ListeRepository;

class ReçueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

        protected $parcel;

    public function __construct(ListeRepository $reçoi_liste)
    {
        $this->parcel = $reçoi_liste;
    }
    public function index()
    {
        $parcels = $this->parcel->list_reçoi(10);
        return view('listes.reçue')->with('parcel', $parcels);
    }
    public function view($id)
    {
        $mouvement = Mouvement::where('preparations_id',$id)->first();
        $parcel = Parcel::all()->where('preparations_id',$id);
        return view('listes.detailreçue')->with(['parcel'=>$parcel,'mouvement'=>$mouvement]);
    }

    public function update(Request $request,$id=null)
    {
        if ($request->isMethod('post')){
            $data = $request->all();
            $this->validate($request,[
                'date_receive' => 'required',
            ]);
        Mouvement::where(['preparations_id'=>$id])->update([
            'date_receive' => $data['date_receive'],
            'status' => "1"
            ]);
        return redirect('/liste-reçue')->with('success','Bien recue');
            }
        $mouvement = Mouvement::where('preparations_id',$id)->first();
        return view('listes.receive')->with('mouvement',$mouvement);
    }
}
