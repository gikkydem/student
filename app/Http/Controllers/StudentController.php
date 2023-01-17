<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //open table

        $student_data = student::paginate(5);
        return view('student/view', compact('student_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //open form
        return view('student/create');
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
        $validator = validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|digits:10',
            'dob' => 'date_format:Y-m-d|before:today',
            'image' => 'sometimes|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if ($validator->passes()) {
            $student_obj = new student();

            $student_obj->name = $request->name;
            $student_obj->email = $request->email;
            $student_obj->phone = $request->phone;
            $student_obj->dob = $request->dob;
            $student_obj->gender = $request->gender;


            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '.' . $file->getClientOriginalName();
                $file->storeAs('public/image', $filename);
                $student_obj->image = $filename;


                // $ext = $request->image->getClientOriginalExtension();
                // // $request->image->storeAs('public/image',$ext);
                // $new = time() . '.' . $ext;
                // $request->image->move(public_path() . '/uploads/students/', $new);
                // $student_obj->image = $new;
                // $student_obj->save();
            }

            $student_obj->save();
            return redirect('student')->with('status', 'User created successfully.');
        } else {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $student = student::find($id);
        return view('student.edit', compact('student'));
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
        //
        $validator = validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|digits:10',
            'dob' => 'date_format:Y-m-d|before:today',
            'image' => 'sometimes|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if ($validator->passes()) {
            $data = student::find($id);

            $data->name = $request->name;
            $data->email = $request->email;
            $data->phone = $request->phone;
            $data->dob = $request->dob;
            $data->gender = $request->gender;


            if ($request->image) {
                $destination = 'storage/image/' . $data->image;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                // $oldimage = $data->image;
                // if ($oldimage) {
                //     File::delete('/storage/image/' . $oldimage);
                // }

                // $ext = $request->image->getClientOriginalExtension();
                // $new = time() . '.' . $ext;
                // $request->image->move(public_path() . '/uploads/students/', $new);
                // $data->image = $new;

                $file = $request->file('image');
                $filename = time() . '.' . $file->getClientOriginalName();
                $file->storeAs('public/image', $filename);
                $data->image = $filename;
            }

            $data->save();
            return redirect('student');
        } else {
            return redirect('/student/create')->withErrors($validator)->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = student::find($id);
        $path = 'storage/image/' . $data->image;
        if (File::exists($path)) {
            File::delete($path);
        }
        $data->delete();
        return redirect('student');

        // if ($data) {
        //     if($data->image){
        //         $oldimage=$data->image;
        //         $image_path= public_path("\storage\images\\") .$oldimage;
        //         File::delete($image_path);
        //     }
        //     $data->delete();
        //     return redirect('student');
        // }else {
        //     return redirect('student');
        // }

    }
}
