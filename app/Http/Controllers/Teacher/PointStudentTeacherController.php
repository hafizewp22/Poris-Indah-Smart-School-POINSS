<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\PointStudent;
use App\Models\PSAward;
use App\Models\PSViolation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PointStudentTeacherController extends Controller
{
    function DataPoint() {
        $userStudent = User::latest('name', 'ASC')->get();
        $PSViolations = PSViolation::where('input', '=', Auth::user()->id)->get();
        $PSAwards = PSAward::where('input', '=', Auth::user()->id)->paginate(10);
        return view('teacher.point.data_point', compact('userStudent', 'PSViolations', 'PSAwards'));
    }

    function AddPointViolation(Request $request) {

        $insertGetId = PointStudent::insertGetId([
            'id_student' =>$request->id_student,
            'name_ps' =>$request->name_ps,
        ]);

        PSViolation::insert([
            'id_ps' => $insertGetId,
            'violation' =>$request->violation,
            'date' =>$request->date,
            'point' =>$request->point,
            'input' => Auth::user()->id,
        ]);

        return redirect()->back();
    }

    function AddPointAwards(Request $request) {

        $insertGetId = PointStudent::insertGetId([
            'id_student' =>$request->id_student,
            'name_ps' =>$request->name_ps,
        ]);

        PSAward::insert([
            'id_ps' => $insertGetId,
            'award' =>$request->award,
            'date' =>$request->date,
            'point' =>$request->point,
            'input' => Auth::user()->id,
        ]);

        return redirect()->back();
    }

    function DataViolation($id) {
        $PSViolations = PSViolation::find($id);
        return view('admin.point.data_point', compact( 'PSViolations'));
    }

    function DataAwards($id) {
        $PSAwards = PSAward::find($id);
        return view('admin.point.data_point', compact( 'PSAwards'));
    }

    public function DeletePointViolation($id){
//        PointStudent::findOrFail($id)->delete();
        PSViolation::findOrFail($id)->delete();

        return redirect()->back();
    }

    public function DeletePointAwards($id){
//        PointStudent::findOrFail($id)->delete();
        PSAward::findOrFail($id)->delete();

        return redirect()->back();
    }
}
