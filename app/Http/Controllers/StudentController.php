<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{

    protected $student;
    public function __construct(){
        $this->student = new Student();
        
    }
    
   public function index(Request $request)
{
    if (!session()->has('username')) {
        return redirect()->route('login');
    }

    $students = $this->student->all();
    $showCreate = $request->query('create', false); 

    return view('pages.index', compact('students', 'showCreate'));
}

    

    
    public function create()
    {
        
    }

   
    public function store(Request $request)
{
    $this->student->create($request->all());
    return redirect()->route('student.index');
}


    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $response['student'] = $this->student->find($id);
        return view('pages.edit')->with($response);
    }

    public function update(Request $request, string $id)
    {
        $student = $this->student->find($id);
        $student->update(array_merge($student->toArray(), $request->toArray()));
        return redirect('student');
    }

    public function destroy(string $id)
    {
        $student = $this->student->find($id);
        $student->delete();
        return redirect('student');
    }
    
}
