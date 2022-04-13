@extends('student.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-2">
            <h2 align="center">INFORMATION TECHNOLOGY-STATE POLYTECHNIC OF MALANG</h2>
            <br>
            <h1 align="center">Kartu Hasil Studi(KHS)</h1>
        </div>
        <div class="float-left my-2">
            <p><strong>Name: </strong>{{$value->name}}</p>
            <p><strong>NIM: </strong>{{$value->nim}}</p>
            <p><strong>Class: </strong>{{$value->class->class_name}}</p>
        </div>
    </div>
</div>


<table class="table table-bordered mt-3">
    <tr>    
            <th><strong>Course</strong></th>
            <th><strong>SKS</strong></th>
            <th><strong>Semester</strong></th>
            <th><strong>Value</strong></th>
    </tr>
    @foreach($value->course as $csr)
    <tr>
            <td>{{ $csr ->course_name }}</td>
            <td>{{ $csr ->sks }}</td>
            <td>{{ $csr ->semester }}</td>
            <td>{{ $csr ->pivot->value }}</td>
    </tr>
    @endforeach
</table>
<div class="float-right my-2">
    <a href="{{ route('student.index') }}" class="btn btn-success mt-3">Go Back</a>
</div>

@endsection 