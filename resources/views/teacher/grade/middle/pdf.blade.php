<!DOCTYPE html>
<html>
<head>
    <title>Middle Semester Report</title>
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
    <h3>Middle Semester Report</h3>
</center>

<div>Name Teacher: {{Auth::user()->name}}</div>
<div>Class: {{$userGrades->subjects->classs->name_class}}</div>
<div>Subject: {{$userGrades->subjects->name_subject}}</div>
<div>Min Score: {{$userGrades->min_score}}</div>
<div>Academic Year / Semester: {{$userGrades->academicYear->name_academic_year}} - {{$userGrades->semesters->name_semester}}</div>

<table class='table table-bordered'>
    <thead>
    <tr>
        <th>No</th>
        <th>NISN</th>
        <th>Name Student</th>
        <th>Mid Exam</th>
    </tr>
    </thead>
    <tbody>
    @php $no = 1; @endphp
    @foreach($subjectAfter as $data)
        <tr>
            <td>{{$no++}}</td>
            <td>{{$data->username}}</td>
            <td>{{$data->name}}</td>

            @if($data->min_text < $data->min_score)
                <td>{{$data->min_text}}}</td>
            @else
                <td>{{$data->min_text}}</td>
            @endif

        </tr>
    @endforeach
    </tbody>
</table>



</body>
</html>
