<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'id' => 'educations',
            'educations' => Education::orderBy('created_at', 'desc')->paginate(10)
        );
        return view('education.index')
            ->with($data)
        ->with('alertType');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('education.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Validator::isCharSurpassingLimit($request->school)) {
            return back()
                ->with('alertType', 'danger')
                ->with('alertMsg', 'School name maksimal 1 kata');
        }

        $education = new Education();
        $education->school = $request->school;
        $education->graduationYear = $request->graduationYear;
        $education->description = $request->description;
        $education->save();


        return redirect('education')
            ->with('alertType', 'success')
            ->with('alertMsg', 'Data Education berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = array(
            'id' => 'education',
            'education' => Education::find($id)
        );
        return view('education.show')
            ->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = array(
            'id' => 'education',
            'education' => Education::find($id)
        );
        return view('education.edit')
            ->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Validator::isCharSurpassingLimit($request->school)) {
            return back()
                ->with('alertType', 'danger')
                ->with('alertMsg', 'School name maksimal 1 kata');
        }

        Education::where('id', $id)->update([
            'school' => $request->school,
            'graduationYear' => $request->graduationYear,
            'description' => $request->description
        ]);

        return redirect('education')
            ->with('alertType', 'success')
            ->with('alertMsg', 'Data Education berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $education = Education::find($id);
        $education->delete();
        return redirect('education');
    }
}
