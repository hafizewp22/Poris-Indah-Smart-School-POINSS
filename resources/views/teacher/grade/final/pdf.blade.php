<!DOCTYPE html>
<html>
<head>
    <title>Final Semester Report</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<style type="text/css">
    table tr td,
    table tr th{
        font-size: 9pt;
    }
</style>
<center>
    <h3>Final Semester Report</h3>
</center>

<div>Name Teacher: {{Auth::user()->name}}</div>
<div>Class: {{$userGrades->subjects->classs->name_class}}</div>
<div>Subject: {{$userGrades->subjects->name_subject}}</div>
<div>Min Score: {{$userGrades->min_score}}</div>
<div>Academic Year / Semester: {{$userGrades->academicYear->name_academic_year}} - {{$userGrades->semesters->name_semester}}</div>

<table class='table table-bordered'>
    <thead>
    <tr>
        <th>
            No
        </th>
        <th>
            NISN
        </th>
        <th>
            Name Student
        </th>
        <th>
            Min Score
        </th>
        <th>
            Quiz
        </th>
        <th>
            Assignment
        </th>
        <th>
            Daily Tests
        </th>
        <th>
            Mid Exam
        </th>
        <th>
            Final Exam
        </th>
        <th>
            Total
        </th>
    </thead>
    <tbody>
    @php $no = 1; @endphp
    @foreach($subjectAfter as $data)
        <tr>
            <th>
                {{$no++}}
            </th>
            <th>
                {{$data->username}}
            </th>
            <th>
                {{$data->name}}
            </th>
            <th>
                {{$data->min_score}}
            </th>
            <th>
                {{$data->quiz}}
            </th>
            <th>
                {{$data->assignment}}
            </th>
            <th>
                {{$data->d_t}}
            </th>
            <th>
                {{$data->min_text}}
            </th>
            <th>
                {{$data->final_text}}
            </th>
            <th>
                {{$data->total}}
            </th>
        </tr>
    @endforeach
    </tbody>
</table>



</body>
</html>
