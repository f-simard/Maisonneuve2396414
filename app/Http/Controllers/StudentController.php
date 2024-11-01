<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$students = Student::select('id', 'name')->orderby('name')->paginate(10);

		return view('student.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$dateMin = now()->subYear(16)->toDateString();

		$request->validate([
			'name' =>'required|string|max:191',
			'address' =>'required|string|max:191',
			'city_id'=> 'required|exists:App\Models\City,id',
			'phone'=> 'nullable|regex:/^\d{3}-\d{3}-\d{4}$/i',
			'email'=>'nullable|email|unique:students',
			'birthday'=>'required|before:' . $dateMin,
		]);

		$student = new Student;
		$student->fill($request->all());
		$student->save();


		return redirect()->route('student.show', $student->id)->with(
			'success',
			'Student record successfully crated.'
		);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
		return view('student.show', ['student' => $student]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
		$student->delete();

		return redirect()->route('student.index')->with('success', 'Student ' . $student->id . ' deleted successfully.');
    }
}
