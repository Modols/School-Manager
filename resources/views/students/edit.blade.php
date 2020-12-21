@extends('layouts.app')

@section('title')
Students Edit
@endsection

@section('body-title')
Students Edit 
@endsection

@section('content')

    <form method="POST"  action="{{ route("students.update", ['student'=>$student]) }}" >
        @method("PUT")
        @csrf
        <div class="mb-3">
            <label for="name" style="font-size: 20px">Student's Name :</label>
            <input type="text" class="form-control form-control-lg" name="name" value="{{$student->name}}"  placeholder="Entrer a Student's name" required>
        </div>
        
        <div class="mb-3">
            <label for="firstName" style="font-size: 20px">Student's First Name :</label>
            <input type="text" class="form-control form-control-lg" name="firstName" value="{{$student->firstName}}" placeholder="Entrer a Student's First Name" required>
        </div>

        <div class="mb-3">
            <label for="email" style="font-size: 20px">Student's email :</label>
            <input type="email" class="form-control form-control-lg" name="email" value="{{$student->email}}" placeholder="Entrer a Student's email" required>
        </div>
        <br>

        <h3>Add this Student to a Promotion :</h3>
        <br>
        <div class="row" >
            @foreach ($promotions as $promotion)
                <div class="col-sm-4">
                    <div class="mb-3 form-check">
                        <input type="radio" class="form-check-input" id="promotion-{{ $promotion->id }}"
                        value="{{ $promotion->id }}" name="promotion"
                                @if(isset($student->promotion) && $promotion->id == $student->promotion->id   ) checked @endif
                        >
                        <label class="form-check-label" for="promotion-{{ $promotion->id }}">{{ $promotion->name }}  {{ $promotion->speciality }}</label>
                    </div>
                </div>
            @endforeach
            <div class="col-sm-4">
                <div class="mb-3 form-check">
                    <input type="radio" class="form-check-input" id="promotion-no_promotion" value="no_promotion" name="promotion">
                    <label class="form-check-label" for="promotion-no_promotion">No Promotion</label>
                </div>
            </div>
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
                                    value="{{ $module->id }}" name="modules[]"
                                    @foreach($student->modules as $possibleModule)
                                        @if($possibleModule->id == $module->id) checked @endif
                                    @endforeach
                            >
                    </div>
                </div>
            @endforeach
        </div>
        <br>
        
        <button type="submit" class="btn btn-success">Edit this Student</button>
    </form>   

@endsection


