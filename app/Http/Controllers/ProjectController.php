<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    public function __construct() {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'id' => 'projects',
            'projects' => Project::orderBy('created_at', 'desc')->paginate(10)
        );
        return view('projects.index')
            ->with($data);
//        return Project::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Validator::isCharSurpassingLimit($request->title)) {
            return back()
                ->with('alertType', 'danger')
                ->with('alertMsg', 'Title maksimal 1 kata');
        }

        $project = new Project();
        $project->title = $request->input('title');
        $project->description = $request->input('description');
        $project->tech = $request->input('tech');
        $project->members = $request->input('members');
        $project->revenue = $request->input('revenue');
        $project->save();

        return redirect('projects')
            ->with('alertType', 'success')
            ->with('alertMsg', 'Data Project berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = array(
            'id' => 'project',
            'project' => Project::find($id)
        );

        return view('/projects.show')
            ->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = array(
            'id' => 'project',
            'project' => Project::find($id)
        );

        return view('projects.edit')
            ->with($data);
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
        if (Validator::isCharSurpassingLimit($request->title, 100)) {
            return back()
                ->with('alertType', 'danger')
                ->with('alertMsg', 'Title maksimal 100 huruf');
        }



        Project::where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'tech' => $request->tech,
            'members' => $request->members,
            'revenue' => $request->revenue
        ]);

        return redirect('projects')
            ->with('alertType', 'success')
            ->with('alertMsg', 'Data Project berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        $project->delete();
        return redirect('projects');
    }
}
