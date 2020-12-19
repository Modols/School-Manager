@extends('layouts.app')

@section('title')
Promotion creation
@endsection

@section('body-title')
Promotion creation 
@endsection

@section('content')

    <form method="POST"  action="{{ route("promotions.store") }}" >
        @csrf
        <div class="mb-3">
            <label for="name" style="font-size: 20px">Promotion's Name :</label>
            <input type="text" class="form-control form-control-lg" name="name"  placeholder="Entrer a promotion's name" required>
        </div>
        
        <div class="mb-3">
            <label for="speciality" style="font-size: 20px">Promotion's speciality :</label>
            <input type="text" class="form-control form-control-lg" name="speciality"  placeholder="Entrer a promotion's speciality" required>
        </div>
        <br>

        <h3>Add module to promotion</h3>
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

        <h3>Add Student to promotion</h3>
        <br>
        <div class="row" >
            @foreach ($students as $student)
                <div class="col-sm-4">
                    <div class="mb-3 form-check">
                        <label class="form-check-label" for="student-{{ $student->id }}">{{ $student->name }} {{ $student->firstName }}</label>
                        <input type="checkbox" class="form-check-input" id="student-{{ $student->id }}"
                                    value="{{ $student->id }}" name="students[]">
                    </div>
                </div>
            @endforeach
        </div>
        <br>
        
        <button type="submit" class="btn btn-success">Create the promotion</button>
    </form>   

@endsection


