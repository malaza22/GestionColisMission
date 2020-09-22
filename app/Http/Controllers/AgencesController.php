<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class AgencesController extends Controller
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
                'name' => ['required', 'max:50'],
                'email' => ['required', 'email', 'unique:agencies'],
                'phone_number' => ['required', 'max:50'],
                'location' => ['required'],
            ]);

            $config = ['table' => 'agencies', 'length' => 10, 'prefix' => 'AGENCY-'];
            $id = IdGenerator::generate($config);

            $agency = new Agency;
            $agency->id = $id;
            $agency->name = $data['name'];
            $agency->email = $data['email'];
            $agency->phone_number = $data['phone_number'];
            $agency->location = $data['location'];
            $agency->slug = $data['name'] . '_' . $data['location'];
            $agency->save();

            return redirect()->back()->with('success', 'Agency Add successfully !');
        }

        return view('body.agencies.index');
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
    public function store()
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
        $agency = Agency::all()->where('id', '!=', Auth()->user()->agencies_id);
        $number = 1;
        return view('body.agencies.liste')->with(['agency'=>$agency,'number'=>$number]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edite()
    {

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
        $this->validate($request, [
            'name' => ['required', 'max:50'],
            'email' => ['required', 'email'],
            'phone_number' => ['required'],
            'location' => ['required', 'max:50'],
        ]);
        $agency = Agency::findOrFail($request->id);
        $agency->update($request->all());
        return back()->with('success', 'Agency update successfully !');
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
        $agences = Agency::findOrFail($request->id);
        $agences->delete();
        return back()->with('error', 'Agence Delete');
    }
}
