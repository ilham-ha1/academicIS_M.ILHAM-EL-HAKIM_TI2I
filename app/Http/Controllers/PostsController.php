<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;
use DB;

class PostsController extends Controller
{
    public function search(Request $request){
        // Get the search value from the request
        $search = $request->input('search');
    
        // Search in the title and body columns from the posts table
        $posts = Student::query()
            ->where('nim', 'LIKE', "%{$search}%")
            ->orWhere('name', 'LIKE', "%{$search}%")
            ->get();
    
        // Return the search view with the resluts compacted
        return view('student.search', compact('posts'));
    }
}
