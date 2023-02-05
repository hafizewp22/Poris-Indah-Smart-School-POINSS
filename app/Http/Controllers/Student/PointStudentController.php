<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\PSAward;
use App\Models\PSViolation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PointStudentController extends Controller
{
    function DataPoint() {
        $userStudent = User::latest('name', 'ASC')->get();

        $dataViolations = PSViolation::violations();
        $dataAwards = PSAward::awards();

        return view('student.point.data_point', compact('userStudent', 'dataViolations', 'dataAwards'));
    }
}
