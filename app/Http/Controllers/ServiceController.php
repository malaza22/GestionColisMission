<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class ServiceController extends Controller
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
            $config = ['table' => 'services', 'length' => 12, 'prefix' => 'SERVICE-'];
            $id = IdGenerator::generate($config);
            $service = new Service;
            $service->id = $id;
            $service->agencies_id = Auth()->user()->agencies_id;
            $service->name = $data['name'];

            if (DB::table('services')->where('name', '=', $data['name'])->exists()) {
                return redirect()->back()->with('error', "<strong>" . $data['name'] . "</strong> est dejà existe!");
            } else {
                $service->save();
                return redirect()->back()->with('success', 'Service Add successfully !');
            }
        }
        return view('body.services.index');
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
    public function show(Request $request, $id = null)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $this->validate($request, [
                'name' => ['required', 'max:50'],
            ]);

            Service::where(['id' => $id])->update([
                'name' => $data['name']
            ]);
            return redirect('/list-service')->with('success', 'Service Update');
        }
        $services = Service::where(['id' => $id])->first();
        $service = Service::all()->where('agencies_id', '=', Auth()->user()->agencies_id);
        $number = 1;
        return view('body.services.liste')->with(['service' => $service, 'services' => $services,'number'=>$number]);
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

            Service::where(['id' => $id])->update([
                'name' => $data['name']
            ]);
            return redirect('/list-service')->with('success', 'Service Update');
        }
        $service = Service::where(['id' => $id])->first();
        $services = Service::all()->where('agencies_id', '=', Auth()->user()->agencies_id);
        return view('body.services.edite')->with(['service' => $service, 'services' => $services]);
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
        $service = Service::findOrFail($request->id);
        $service->update($request->all());
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
        $service = Service::findOrFail($request->id);
        $service->delete();
        return back()->with('error', 'Service Delete');
    }
}
