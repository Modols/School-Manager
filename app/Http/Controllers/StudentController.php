<?php

namespace App\Http\Controllers;

use App\Module;
use App\Promotion;
use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $promotions = Promotion::orderBy('name', 'asc')->get();
        $arrayStudent = array();

        foreach($promotions as $key => $value){
            $promotionNameSpeciality = $value->name . ' ' .$value->speciality ;
            $tmp = array('promotionNameSpeciality' =>$promotionNameSpeciality  ,
                        'student' => array());
            foreach($value->students as $k => $student){
                array_push($tmp['student'], $student);
            }
            array_push($arrayStudent, $tmp);
        }

        $freestudents = Student::whereNull('promotion_id')->get();

        $students='';
        $search = $request->search;
        if (!(empty($search))) {
            $students = Student::where('name', 'like', '%' . $search . '%')
            ->orWhere('firstName', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%')
            ->get();
        }
        return view('students.index', [
            'freestudents' => $freestudents,
            'promotions' => $arrayStudent, 
            'search' => $search,
            'studentsSearch' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $promotions = Promotion::all();
        $modules = Module::all();
        return view('students.create', ['modules' => $modules, 'promotions' => $promotions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newStudent = new Student();
        $newStudent->name = $request->name;
        $newStudent->firstName = $request->firstName;
        $newStudent->email = $request->email;
        $newStudent->promotion_id = $request->promotion;
        $newStudent->save();

        if(isset($request->promotion)){
            $promotion = Promotion::find($request->promotion);
            if(isset($request->modules)){
                $modulesOfPromotion = $promotion->modules;
                $modulesOfInputs = $request->modules;

                foreach($modulesOfPromotion as $key => $module){
                    if(!in_array($module->id, $modulesOfInputs)){
                        $modulesOfInputs[] += $module->id;
                    }
                }

                foreach($modulesOfInputs as $key => $value){
                    $module = Module::find($value);
                    $module->students()->attach($newStudent);
                }

            }else{
                $newStudent->modules()->attach($promotion->modules());
            }
        
        }
        elseif(isset($request->modules)){
            $newStudent->modules()->attach($request->modules);
        }

        return redirect(route('students.show', ['student'=>$newStudent]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('students.show', ['student'=>$student]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $promotions = Promotion::all();
        $modules = Module::all();
        return view('students.edit', [
            'student' => $student,
            'promotions' => $promotions,
            'modules' => $modules]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        print_r($request->all());
        $studentUpdate = Student::find($student->id);
        $studentUpdate->name = $request->name;
        $studentUpdate->firstName = $request->firstName;
        $studentUpdate->email = $request->email;
        if($request->promotion == 'no_promotion'){
            $studentUpdate->promotion_id = NULL;
        }else{
            $studentUpdate->promotion_id = $request->promotion;
        }
        $studentUpdate->save();

        $studentUpdate->modules()->detach();
        $studentUpdate->modules()->attach($request->modules);

        return redirect(route('students.show', ['student'=> $studentUpdate]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->modules()->detach();
        $student->delete();
        return redirect(route('students.index'));
    }
}
