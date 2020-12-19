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
    public function index()
    {
        $promotions = Promotion::all();
        return view('promotions.index', ['promotions' => $promotions]);
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
        $students = Student::whereNull('promotion_id')->get();

        return view('promotions.edit', [
            'promotion' => $promotion,
            'modules' => $modules]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promotion $promotion)
    {
        //
    }
}
