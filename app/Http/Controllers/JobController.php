<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class JobController extends Controller
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
                'description' => ['required', 'max:255'],
            ]);

            $config = ['table' => 'jobs', 'length' => 10, 'prefix' => 'JOB-'];
            $id = IdGenerator::generate($config);
            $job = new Job;
            $job->id = $id;
            $job->agencies_id = Auth()->user()->agencies_id;
            $job->description = $data['description'];

            if (DB::table('jobs')->where('description', '=', $data['description'])->exists()) {
                return redirect()->back()->with('error', "<strong>" . $data['description'] . "</strong> est dejà existe!");
            }else{
                $job->save();
                return redirect()->back()->with('success', 'Proffession ajouter avec succée !');
            }
        }
        return view('body.jobs.index');
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
        $jobs = Job::all()->where('agencies_id', '=', Auth()->user()->agencies_id);
        $number = 1;
        return view('body.jobs.liste')->with(['jobs'=>$jobs,'number'=>$number]);
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
                'description' => ['required', 'max:255'],
            ]);

            Job::where(['id' => $id])->update([
                'description' => $data['description']
            ]);
            return redirect('/list-job')->with('success', 'Proffession Update');
        }
        $job = Job::where(['id' => $id])->first();
        $jobs = Job::all()->where('agencies_id', '=', Auth()->user()->agencies_id);
        return view('body.jobs.edite')->with(['job' => $job, 'jobs' => $jobs]);
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
        $jobs = Job::findOrFail($request->id);
        $jobs->update($request->all());
        return back()->with('success', 'Jobs update successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $jobs = Job::findOrFail($request->id);
        $jobs->delete();
        return back()->with('error', 'Proffession Delete');
    }
}
