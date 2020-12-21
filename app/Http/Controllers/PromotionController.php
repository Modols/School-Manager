<?php

namespace App\Http\Controllers;

use App\Promotion;
use App\Module;
use App\Student;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $promotions = Promotion::all();
        $search = $request->search;
        if (!(empty($search))) {
            $promotions = Promotion::where('name', 'like', '%' . $search . '%')
            ->get();
        }
        return view('promotions.index', ['promotions' => $promotions, 'search' => $search]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modules = Module::all();
        $students = Student::whereNull('promotion_id')->get();

        return view('promotions.create', 
        ['modules' => $modules,
         'students' => $students]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newPromotion = new Promotion();
        $newPromotion->name = $request->name;
        $newPromotion->speciality = $request->speciality;
        $newPromotion->save();

        $students = $request->students;
        if(!(empty($students))){
            foreach($students as $key => $value){
                $student = Student::find($value);
                $student->promotion_id = $newPromotion->id;
                $student->modules()->attach($request->modules);
                $student->save();
            }
        }
        

        $newPromotion->modules()->attach($request->modules);

        return redirect(route('promotions.show', ['promotion' => $newPromotion]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function show(Promotion $promotion)
    {
        return view('promotions.show', ['promotion' => $promotion]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function edit(Promotion $promotion)
    {
        $modules = Module::all();
        $freeStudents = Student::whereNull('promotion_id')->get();

        return view('promotions.edit', [
            'promotion' => $promotion,
            'modules' => $modules,
            'freeStudents' => $freeStudents]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promotion $promotion)
    {
        $promotionUpdate = Promotion::find($promotion->id);
        $promotionUpdate->name = $request->name;
        $promotionUpdate->speciality = $request->speciality;
        $promotionUpdate->save();

        $promotion->students()->each(function ($student) {
            $student->promotion_id = NULL;
            $student->push();
        });
        $students = $request->students;

        if(!(empty($students))){
            foreach($students as $key => $value){
                $student = Student::find($value);
                $student->modules()->detach();
                $student->modules()->attach($request->modules);
                $student->promotion_id = $promotion->id;
                $student->push();
            }
        }

        $promotion->modules()->detach();
		$promotion->modules()->attach($request->modules);

        return redirect(route('promotions.show', ['promotion' => $promotion]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promotion $promotion, Request $request)
    {
        $promotion->delete();
        $promotion->modules()->detach();

        if(isset($request->deleteAll)){
            $promotion->students()->each(function($student){
                $student->modules()->detach();
                $student->delete();
            });
        }else{
            $promotion->students()->each(function ($student) {
                $student->modules()->detach();
                $student->promotion_id = NULL;
                $student->push();
            });
        }

        return redirect(route('promotions.index'));
    }
}
