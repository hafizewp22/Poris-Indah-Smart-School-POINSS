<!DOCTYPE html>
<html>
<head>
    <title>Monthly Education Report and Midterm Exam</title>
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
    <h3>Monthly Education Report and Midterm Exam</h3>
</center>

<div>Name: {{Auth::user()->name}}</div>
<div>Class: {{Auth::user()->name}}</div>

<table class='table table-bordered'>
    <thead>
    <tr>
        <th>No</th>
        <th>Subject</th>
        <th>Mid Score</th>
        <th>Component</th>
        <th>Score</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
    @php $no = 1; @endphp
    @foreach($subject as $data)
        <tr>
            <td>{{$no++}}</td>
            <td>
                <div>{{$data->name_subject}}</div>
                <div>({{$data->teachers->name}})</div>
            </td>
            <td>{{$data->min_score}}</td>
            <td>
                <div class="py-1">Quiz: {{$data->quiz}}</div>
                <div class="py-1">Assignment: {{$data->assignment}}</div>
                <div class="py-1">Daily Test: {{$data->d_t}}</div>
                <div class="py-1">Mid Exam: {{$data->min_text}}</div>
                <div class="py-1">Final Exam: {{$data->final_text}}</div>
            </td>

            @if($data->total < $data->min_score)
                <td>{{$data->total}}</td>
            @else
                <td>{{$data->total}}</td>
            @endif

            @if($data->total < $data->min_score)
                <th>
                    Fail
                </th>
            @else
                <th>
                    Passed
                </th>
            @endif
        </tr>
    @endforeach
    </tbody>
</table>



</body>
</html>
