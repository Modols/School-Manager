@extends('layouts.app')

@section('title')
Module Detail
@endsection

@section('body-title')
Module Detail 
@endsection

@section('content')
    <br>
    <form method="POST"  action="{{ route("modules.update", ['module' => $module]) }}" >
        @method("PUT")
        @csrf
        
        <div class="mb-3">
            <label for="name" style="font-size: 20px">Module's Name :</label>
            <input type="text" class="form-control form-control-lg" name="name" value="{{$module->name}}"  placeholder="Entrer a promotion's name" required>
        </div>
        
        <div class="mb-3">
            <label for="description" style="font-size: 20px">Module's description :</label>
            <textarea class="form-control form-control-lg" id="description" rows="2" placeholder="Entrer a module's description" name="description" required>{{$module->description}}</textarea>
        </div>
        <br>
        
        <h2 >List of all Promotions* : </h2>
        <p class="mb-5"><small>* Add a module to a promotion will add all promotion's students</small></p>
        <div class="row mb-3">
            @foreach($promotions as $promotion)
                <div class="col mb-4 form-check" >
                    <input type="checkbox" class="form-check-input" id="promotion-{{ $promotion->id }}"
                    value="{{ $promotion->id }}" name="promotions[]"
                        @foreach($module->promotions as $possiblePromotion)
                            @if($possiblePromotion->id == $promotion->id) checked @endif
                        @endforeach
                    >
                    <label class="form-check-label" for="promotion-{{ $promotion->id }}">{{ $promotion->name }} | {{ $promotion->speciality }}</label>
                </div>
            @endforeach
        </div>
        
        <button type="submit" class="btn btn-lg btn-success">Edit this Module</button>
    </form> 

@endsection




