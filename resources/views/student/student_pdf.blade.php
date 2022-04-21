<!DOCTYPE html>
<html>
<head>
    <title>PDF Student Report</title>
</head>
<body>
    <style type="text/css">
        table tr td,
        table tr th{
            font-size: 9pt;
        }
    </style>
    <center>
        <h5>Student Report</h4>
    </center>
    
    <div class="float-left my-2">
        <p><strong>Name: </strong>{{$Student->name}}</p>
        <p><strong>NIM: </strong>{{$Student->nim}}</p>
        <p><strong>Class: </strong>{{$Student->class->class_name}}</p>
    </div>
    <br>
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>Course</th>
                <th>SKS</th>
                <th>Semester</th>
                <th>Grade</th>
            </tr>
        </thead>
    <tbody>
    @foreach($Student->course as $st)
        <tr>
            <td>{{$st->course_name}}</td>
            <td>{{$st->sks}}</td>
            <td>{{$st->semester}}</td>
            <td>{{$st->pivot->value}}</td>
        </tr>
    @endforeach
    </tbody>
    </table>
</body>
</html>