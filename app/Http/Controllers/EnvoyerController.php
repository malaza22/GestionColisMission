<?php

namespace App\Http\Controllers;

use App\Models\Parcel;
use App\Models\Mouvement;
use App\Repositories\ListeRepository;


class EnvoyerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $parcel;

    public function __construct(ListeRepository $envoi_liste)
    {
        $this->parcel = $envoi_liste;
    }

    public function index()
    {
        $listenvoi = $this->parcel->list_envoi(10);
        return view('listes.envoyer')->with('listenvoi', $listenvoi);
    }

    public function view($id)
    {
        $mouvement = Mouvement::where('preparations_id', $id)->first();
        $parcel = Parcel::all()->where('preparations_id', $id);
        return view('listes.detailenvoi')->with(['parcel' => $parcel, 'mouvement' => $mouvement]);
    }

    public function print($id)
    {
        $mouvement = Mouvement::where('preparations_id', $id)->first();
        $parcel = Parcel::all()->where('preparations_id', $id);

        // $pdf = \PDF::loadView('listes.print',['parcel'=>$parcel,'mouvement'=>$mouvement]);
        // return $pdf->stream('decharge.pdf');
        // return $pdf->download('decharge.pdf');
        return view('listes.print')->with(['parcel'=>$parcel,'mouvement'=>$mouvement]);
    }
}
