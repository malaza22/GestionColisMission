<?php

namespace App\Http\Controllers;

use App\Models\Packaging;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class PackagingController extends Controller
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
            ]);

            $config = ['table' => 'packagings', 'length' => 15, 'prefix' => 'PACKAGING-'];
            $id = IdGenerator::generate($config);

            $packaging = new Packaging;
            $packaging->id = $id;
            $packaging->name = $data['name'];

            if (DB::table('packagings')->where('name', '=', $data['name'])->exists()) {
                return redirect()->back()->with('error', "<strong>" . $data['name'] . "</strong> est dejà existe!");
            } else {
                $packaging->save();
                return redirect()->back()->with('success', 'Packaging Add successfully !');
            }
        }
        return view('body.packagings.index');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $packaging = Packaging::all();
        $number = 1;
        return view('body.packagings.liste')->with(['packaging'=>$packaging,'number'=>$number]);
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
                'name' => ['required', 'max:50'],
            ]);
            Packaging::where(['id' => $id])->update([
                'name' => $data['name']
            ]);
            return redirect('/list-packaging')->with('success', 'Amballage bien edite');
        }
        $packaging = Packaging::where(['id' => $id])->first();
        $packagings = Packaging::all();
        return view('body.packagings.edite')->with(['packaging' => $packaging, 'packagings' => $packagings]);
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
        $packaging = Packaging::findOrFail($request->id);
        $packaging->update($request->all());
        return back()->with('success', 'user update successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $packaging = Packaging::findOrFail($request->id);
        $packaging->delete();
        return back()->with('error', 'packaging Delete');
    }
}
