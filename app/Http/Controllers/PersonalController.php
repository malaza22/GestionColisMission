<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Personal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use League\CommonMark\Inline\Element\Strong;

class PersonalController extends Controller
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
                'jobs_id' => ['required'],
                'lastname' => ['required', 'max:50'],
                'firstname' => ['required', 'max:50'],
                'email' => ['required', 'email'],
                'phone_number' => ['required', 'numeric'],
            ]);

            $config = ['table' => 'personals', 'length' => 10, 'prefix' => 'PERSONAL-'];
            $id = IdGenerator::generate($config);
            $personal = new Personal;
            $personal->id = $id;
            $personal->agencies_id = Auth()->user()->agencies_id;
            $personal->jobs_id = $data['jobs_id'];
            $personal->lastname = $data['lastname'];
            $personal->firstname = $data['firstname'];
            $personal->email = $data['email'];
            $personal->phone_number = $data['phone_number'];

            if (DB::table('personals')->where('lastname', '=', $data['lastname'])->where('firstname', '=', $data['firstname'])->exists()) {
                return redirect()->back()->with('error', "<strong>" . $data['lastname'] . " " . $data['firstname'] . "</strong> est dejà existe!");
            } else {
                $personal->save();
                return redirect()->back()->with('success', 'Personal ajouter avec succée !');
            }
        }
        $job = Job::all()->where('agencies_id', '=', Auth()->user()->agencies_id);
        $job_dropdown = "<option value=''selected disabled>selected</option>";
        foreach ($job as $jobs) {
            $job_dropdown .= "<option value='" . $jobs->id . "'>" . $jobs->description . "</option>";
        }
        return view('body.personals.index')->with('job_dropdown', $job_dropdown);
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
        $personals = Personal::all()->where('agencies_id', '=', Auth()->user()->agencies_id);
        $job = Job::all()->where('agencies_id', '=', Auth()->user()->agencies_id);

        $job_dropdown = "<option value=''selected disabled>selected</option>";
        foreach ($job as $jobs) {
            $job_dropdown .= "<option value='" . $jobs->id . "'>" . $jobs->description . "</option>";
        }
        $number = 1;
        return view('body.personals.liste')->with([
            'number' => $number,
            'job' => $job,
            'personals' => $personals,
            'job_dropdown' => $job_dropdown
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
                'jobs_id' => ['required'],
                'lastname' => ['required', 'max:50'],
                'firstname' => ['required', 'max:50'],
                'email' => ['required', 'email'],
                'phone_number' => ['required', 'numeric'],
            ]);
            Personal::where(['id' => $id])->update([
                'jobs_id' => $data['jobs_id'],
                'lastname' => $data['lastname'],
                'firstname' => $data['firstname'],
                'email' => $data['email'],
                'phone_number' => $data['phone_number']
            ]);
            return redirect('/list-personal')->with('success', 'Personnel bien edite');
        }
        $personal = Personal::where(['id' => $id])->first();
        $personals = Personal::all();
        $job = Job::all()->where('agencies_id', '=', Auth()->user()->agencies_id);
        $job_dropdown = "<option value=''selected disabled>selected</option>";
        foreach ($job as $jobs) {
            $job_dropdown .= "<option value='" . $jobs->id . "'>" . $jobs->description . "</option>";
        }
        return view('body.personals.edite')->with([
            'job' => $job,
            'personal' => $personal,
            'personals' => $personals,
            'job_dropdown' => $job_dropdown
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
        $this->validate($request, [
            'jobs_id' => ['required'],
            'lastname' => ['required', 'max:50'],
            'firstname' => ['required', 'max:50'],
            'email' => ['required', 'email'],
            'phone_number' => ['required', 'numeric'],
        ]);
        $personal = Personal::findOrFail($request->id);
        $personal->update($request->all());
        return back()->with('success', 'Personnel update successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $personal = Personal::findOrFail($request->id);
        $personal->delete();
        return back()->with('error', 'Personal Delete');
    }
}
