<?php

namespace App\Http\Controllers;

use App\Models\teacher;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    //

    public function index()
    {
        return view('teacher.index');
    }

    public function store(Request $request)
    {

        $validator = validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|digits:10'
        ]);


        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {
            $teacher = new teacher();

            $teacher->name = $request->name;
            $teacher->email = $request->email;
            $teacher->phone = $request->phone;
            $teacher->save();

            return response()->json([
                'status' => 200,
                'message' => 'teacher add successfully',
            ]);
        }
    }


    public function fetchteacher()
    {
        $teacher = teacher::all();
        return response()->json([
            'teacher' => $teacher,
        ]);
    }

    public function  edit($id)
    {
        $teacher = teacher::find($id);
        if ($teacher) {
            return response()->json([
                'status' => 200,
                'teacher' => $teacher,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'teacher not found',
            ]);
        }
    }

    public function  update(Request $request, $id)
    {

        $validator = validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|digits:10'
        ]);


        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {
            $teacher = teacher::find($id);

            if ($teacher) {
                $teacher->name = $request->name;
                $teacher->email = $request->email;
                $teacher->phone = $request->phone;
                $teacher->update();

                return response()->json([
                    'status' => 200,
                    'message' => 'teacher updated successfully',
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'teacher not found',
                ]);
            }
        }
    }


    public function  destroy($id)
    {
        $teacher = teacher::find($id);
        $teacher->delete();
        return response()->json([
            'status' => 200,
            'message' => 'teacher deleted successfully',
        ]);
    }
}
