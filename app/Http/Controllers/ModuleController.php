<?php

namespace App\Http\Controllers;

use App\Module;
use App\Promotion;
use App\Student;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $modules = Module::all();
        $search = $request->search;
        if (!(empty($search))) {
            $modules = Module::where('name', 'like', '%' . $search . '%')
            ->get();
        }
        return view('modules.index', ['modules' => $modules, 'search' => $search]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $promotions = Promotion::all();
        return view('modules.create', ['promotions' => $promotions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newModule = new Module();
        $newModule->name = $request->name;
        $newModule->description = $request->description;
        $newModule->save();

        $promotions = $request->promotions;
        if(!(empty($promotions))){
            foreach($promotions as $key => $value){
                $promotion = Promotion::find($value);
                $students = Student::where('promotion_id', '=', $promotion->id)->get();

                $newModule->students()->attach($students);
                $newModule->promotions()->attach($promotion);
            }
        }
        return redirect(route('modules.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function show(Module $module)
    {
        return view('modules.show', ['module' => $module]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function edit(Module $module)
    {
        $promotions = Promotion::all();
        $freeStudents = Student::whereNull('promotion_id')->get();

        return view('modules.edit', 
        ['module' => $module, 
        'promotions' => $promotions,
        'freeStudents' => $freeStudents]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Module $module)
    {
        $moduleUpdate = Module::find($module->id);
        $moduleUpdate->name = $request->name;
        $moduleUpdate->description = $request->description;
        $moduleUpdate->save();

        if (isset($module->promotions[0])){
            foreach($moduleUpdate->promotions as $key =>$value){
                $promotion = Promotion::find($value->id);
                $students = Student::where('promotion_id', '=', $promotion->id)->get();
                $moduleUpdate->students()->detach($students);
                $moduleUpdate->promotions()->detach($promotion);
            };
        }
        
        $promotions = $request->promotions;
        if(!(empty($promotions))){
            foreach($promotions as $key => $value){
                $promotion = Promotion::find($value);
                $students = Student::where('promotion_id', '=', $promotion->id)->get();
                $moduleUpdate->students()->attach($students);
                $moduleUpdate->promotions()->attach($promotion);
            }
        }

        return redirect(route('modules.show', ['module' => $moduleUpdate]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function destroy(Module $module)
    {
        $module->promotions()->detach();
        $module->students()->detach();
        $module->delete();
        return redirect(route('modules.index'));
    }
}
