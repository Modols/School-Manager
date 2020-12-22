@extends('layouts.app')

@section('title')
Students Creation
@endsection

@section('body-title')
Students Creation 
@endsection

@section('content')

    <form method="POST"  action="{{ route("students.store") }}" >
        @csrf
        <div class="mb-3">
            <label for="name" style="font-size: 20px">Student's Name :</label>
            <input type="text" class="form-control form-control-lg" name="name"  placeholder="Entrer a Student's name" required>
        </div>
        
        <div class="mb-3">
            <label for="firstName" style="font-size: 20px">Student's First Name :</label>
            <input type="text" class="form-control form-control-lg" name="firstName"  placeholder="Entrer a Student's First Name" required>
        </div>

        <div class="mb-3">
            <label for="email" style="font-size: 20px">Student's email :</label>
            <input type="email" class="form-control form-control-lg" name="email"  placeholder="Entrer a Student's email" required>
        </div>
        <br>

        <h3>Add this Student to a Promotion* :</h3>
        <p><small>* Add a student to a promotion will add all promotion's module to the student and you can add aditional module.</small></p>

        <br>
        <div class="row" >
            @foreach ($promotions as $promotion)
                <div class="col-sm-4">
                    <div class="mb-3 form-check">
                        <label class="form-check-label" for="promotion-{{ $promotion->id }}">{{ $promotion->name }}  {{ $promotion->speciality }}</label>
                        <input type="radio" class="form-check-input" id="promotion-{{ $promotion->id }}"
                                    value="{{ $promotion->id }}" name="promotion">
                    </div>
                </div>
            @endforeach
        </div>
        <br>

        <h3>Add this Student to a Module : </h3>
        <br>
        <div class="row" >
            @foreach ($modules as $module)
                <div class="col-sm-4">
                    <div class="mb-3 form-check">
                        <label class="form-check-label" for="module-{{ $module->id }}">{{ $module->name }}</label>
                        <input type="checkbox" class="form-check-input" id="module-{{ $module->id }}"
                                    value="{{ $module->id }}" name="modules[]">
                    </div>
                </div>
            @endforeach
        </div>
        <br>
        
        <button type="submit" class="btn btn-lg btn-success">Create the Student</button>
    </form>   

@endsection


