<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class EducationController extends Controller
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
        $this->validate($request, [
            'school' => 'required|max:255',
            'graduationYear' => 'required|max:4',
            'description' => 'required',
            'picture' => 'image|nullable|max:6000'
        ]);

        if ($request->hasFile('picture')) {
            $filenameWithExt = $request->file('picture')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('picture')->getClientOriginalExtension();
            $filenameSimpan = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('picture')->storeAs('public/education_image', $filenameSimpan);
//
//
////            File::delete(public_path() . '/public/education_image/' . $filenameSimpan);
//
////            $filePath = public_path('/thumbnails');
//            $image = $request->file('picture');
//            $img = Image::make($image->path());
//            $img->resize(400, 400, function ($const) {
//                $const->aspectRatio();
////            })->save('public/education_image/' . $filenameSimpan);
//            })->save(storage_path('education_image/' . $filenameSimpan ));
//
////            $filePath = public_path('/education_image');
////            $image->move($filePath, $filenameSimpan);
        } else {
            $filenameSimpan = 'noimage.png';
        }

        $education = new Education();
        $education->picture = $filenameSimpan;
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
        $this->validate($request, [
            'school' => 'required|max:255',
            'graduationYear' => 'required|max:4',
            'description' => 'required',
            'picture' => 'image|nullable|max:6000'
        ]);

        if ($request->hasFile('picture')) {
            $filenameWithExt = $request->file('picture')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('picture')->getClientOriginalExtension();
            $filenameSimpan = $filename . '_' . time() . '.' . $extension;
//            $path = $request->file('picture')->storeAs('public/education_image', $filenameSimpan);
//
//
////            File::delete(public_path() . '/public/education_image/' . $filenameSimpan);
//
////            $filePath = public_path('/thumbnails');
//            $image = $request->file('picture');
//            $img = Image::make($image->path());
//            $img->resize(400, 400, function ($const) {
//                $const->aspectRatio();
////            })->save('public/education_image/' . $filenameSimpan);
//            })->save(storage_path('education_image/' . $filenameSimpan ));
//
////            $filePath = public_path('/education_image');
////            $image->move($filePath, $filenameSimpan);
        } else {
            $filenameSimpan = 'noimage.png';
        }

        Education::where('id', $id)->update([
            'school' => $request->school,
            'graduationYear' => $request->graduationYear,
            'description' => $request->description,
            'picture' => $filenameSimpan
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
        File::delete(public_path() . '/public/education_image/' . $education->picture);
        $education->delete();
        return redirect('education');
    }
}
