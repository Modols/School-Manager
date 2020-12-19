@extends('layouts.app')

@section('title')
Promotion Edit
@endsection

@section('body-title')
Promotion Edit 
@endsection

@section('content')
<form method="POST"  action="{{ route("promotions.update", ["promotion"=> $promotion]) }}" >
    @method("PUT")
    @csrf

    <div class="mb-3">
        <label for="name" style="font-size: 20px">Promotion's Name :</label>
        <input type="text" class="form-control form-control-lg" name="name" placeholder="Entrer a promotion's name" value="{{$promotion->name}}" required>
    </div>
    
    <div class="mb-3">
        <label for="speciality" style="font-size: 20px">Promotion's speciality :</label>
        <input type="text" class="form-control form-control-lg" name="speciality"  placeholder="Entrer a promotion's speciality" value="{{$promotion->speciality}}" required>
    </div>
    
    <div class="row">
        <div class="col-4">
            <h2 class="mb-5">List of all Module : </h2>
            <div class="row">
                @foreach($modules as $module)
                    <div class="col-5 mb-4 form-check" style="margin-left: 20px">
                        <input type="checkbox" class="form-check-input" id="module-{{ $module->id }}"
                        value="{{ $module->id }}" name="modules[]"
                            @foreach($promotion->modules as $possibleModule)
                                @if($possibleModule->id == $module->id) checked @endif
                            @endforeach
                        >
                        <label class="form-check-label" for="module-{{ $module->id }}">{{ $module->name }}</label>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="col-4">
            <h2>List of all Promotion's Students :</h2>
            <div class="row">
                @foreach($promotion->students as $student)
                    <div class="col-5 mb-4 form-check" style="margin-left: 20px">
                        <input type="checkbox" class="form-check-input" id="student-{{ $student->id }}"
                        value="{{ $student->id }}" name="students[]" checked >
                        <label class="form-check-label" for="student-{{ $student->id }}">{{ $student->name }}</label>
                    </div>
                @endforeach
            </div>
        </div>
        
        <div class="col-4">
            <h2>List of all Students without Promotion :</h2>
            <div class="row">
                @foreach($freeStudents as $freeStudent)
                    <div class="col-5 mb-4 form-check" style="margin-left: 20px">
                        <input type="checkbox" class="form-check-input" id="student-{{ $freeStudent->id }}"
                        value="{{ $freeStudent->id }}" name="students[]"  >
                        <label class="form-check-label" for="student-{{ $freeStudent->id }}">{{ $freeStudent->name }}</label>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-success">Modifier</button>
</form>


@endsection




