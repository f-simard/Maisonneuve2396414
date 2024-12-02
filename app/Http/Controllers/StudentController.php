<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

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
		$cities = City::select()->orderby('name')->get();
		return view('student.create', ['cities'=>$cities]);
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
			'email'=> 'required|email|unique:App\Models\User,email',
			'password'=> 'required|min:6|max:20',
			'birthday'=>'required|before:' . $dateMin,
		]);

		$student = new Student;
		$student->fill($request->all());
		$student->save();

		$user = new User;
		$user->fill($request->all());
		$user->password = Hash::make($request->password);
		$user->save();

		$student->user_id = $user->id;
		$student->save();

		return redirect()->route('student.show', $student->id)->with(
			'success',
			@trans('Student record successfully created.')
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
		$cities = City::select()->orderby('name')->get();
		return view('student.edit', ['student'=>$student, 'cities' => $cities]);
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
		$dateMin = now()->subYear(16)->toDateString();
		$request->validate([
			'name' => 'required|string|max:191',
			'address' => 'required|string|max:191',
			'city_id' => 'required|exists:App\Models\City,id',
			'phone' => 'nullable|regex:/^\d{3}-\d{3}-\d{4}$/i',
			'birthday' => 'required|before:' . $dateMin,
			'email'=> ['email', Rule::unique('users')->ignore($student->user_id)]
		]);

		$student->fill($request->all());
		$student->save();

		$student->user->email = $request->email;
		$student->user->save();

		return redirect()->route('student.show', $student->id)->with(
			'success',
			@trans('Student record successfully updated.')
		);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
		if(Auth::user()->id !== $student->user_id){

			$student->user->delete();
			$student->delete();

			return redirect()->route('student.index')->with('success', 'Student ' . trans('succesfully deleted'));

		} else {

			return redirect()->route('student.show', $student->id)->with('error', trans('unauthorized'));
			
		}

    }
}
