<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\Student;
use Illuminate\Http\Request;
//use DB;
//use PhpParser\Builder\Class_;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = Student::with('class')->get();
        $paginate = Student::orderBy('id_student','asc')->search(request(['search']))->paginate(3);
        return view('student.index',['student' => $student, 'paginate'=>$paginate]);
        // the eloquent function to displays data
        // return view('student.index', [
        //     'student' => Student::orderBy('id_student', 'asc')->search(request(['search']))->paginate(3)
        //  ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $class = ClassModel::all(); //get data from class table
        return view('student.create',['class' => $class]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'Nim' => 'required',
            'Name' => 'required',
            'Class' => 'required',  //why? Class_id?
            'Major' => 'required',
        ]);
        
        $student = new Student;
        $student->nim = $request->get('Nim');
        $student->name = $request->get('Name');
        $student->major = $request->get('Major');
         
        $class = new ClassModel;
        $class->id = $request->get('Class');

        //eloquent function to add data using belongsTo relation
        $student->class()->associate($class);
        $student->save();

        return redirect()->route('student.index')
        ->with('success', 'Student Successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nim)
    {
        // displays detailed data by finding / by Student Nim
        $Student = Student::with('class')->where('nim', $nim)->first();

        return view('student.detail',['Student' => $Student]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nim)
    {
        // displays detail data by finding based on Student Nim for editing
        $Student = Student::with('class')->where('nim',$nim)->first();
        $class = ClassModel::all();
        return view('student.edit',compact('Student','class'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nim)
    {
        //validate the data
        $request->validate([
            'Nim'=>'required',
            'Name'=>'required',
            'Class'=>'required',
            'Major'=>'required',
        ]);

        $student = Student::with('class')->where('nim',$nim)->first();
        $student->nim = $request->get('Nim');
        $student->name = $request->get('Name');
        $student->major = $request->get('Major');

        $class = new ClassModel;
        $class->id = $request->get('Class');
        $student->save();

        //eloquent function to update the data with belongsTo relation
        $student->class()->associate($class);
        $student->save();

        //if the data successfully updated, will return to main page
        return redirect()->route('student.index')
        ->with('success','Student Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nim)
    {
        //Eloquent function to delete the data
        Student::where('nim', $nim)->delete();
        return redirect()->route('student.index')-> with('success', 'Student Successfully Deleted');
    }
}
