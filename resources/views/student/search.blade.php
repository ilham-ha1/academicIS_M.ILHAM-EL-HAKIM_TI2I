@extends('student.layout')

@section('content')
<table class="table table-bordered">
    <tr>
        <th>Nim</th>
        <th>Name</th>
        <th>Class</th>
        <th>Major</th>
        <th>Address</th>
        <th>Date of Birth</th>
        <th width="280px">Action</th>
    </tr>


@if($posts->isNotEmpty())
        @foreach ($posts as $post)
            <div class="post-list">
                <tr>
                    <td>{{ $post ->nim }}</td>
                    <td>{{ $post ->name }}</td>
                    <td>{{ $post ->class }}</td>
                    <td>{{ $post ->major }}</td>
                    <td>{{ $post ->address }}</td>
                    <td>{{ $post ->dateof }}</td>
                </tr>  

            </div>
        @endforeach
    @else 
        <div>
            <h2>No posts found</h2>
        </div>
    @endif
</table>
@endsection