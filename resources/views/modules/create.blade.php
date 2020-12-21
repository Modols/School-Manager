@extends('layouts.app')

@section('title')
Module Creation
@endsection

@section('body-title')
Module Creation 
@endsection

@section('content')
    <br>
    <form method="POST"  action="{{ route("modules.store") }}" >
        @csrf
        
        <div class="mb-3">
            <label for="name" style="font-size: 20px">Module's Name :</label>
            <input type="text" class="form-control form-control-lg" name="name"  placeholder="Entrer a promotion's name" required>
        </div>
        
        <div class="mb-3">
            <label for="description" style="font-size: 20px">Module's description :</label>
            <textarea class="form-control form-control-lg" id="description" rows="2" placeholder="Entrer a module's description" name="description" required></textarea>
          </div>
        <br>

        <h3>Add Promotion to module* : </h3>
        <p><small>* Add a module to a promotion will add all promotion's students</small></p>
        <br>
        <div class="row" >
            @foreach ($promotions as $promotion)
                <div class="col-sm-4">
                    <div class="mb-3 form-check">
                        <label class="form-check-label" for="module-{{ $promotion->id }}">{{ $promotion->name }} | {{ $promotion->speciality }}</label>
                        <input type="checkbox" class="form-check-input" id="module-{{ $promotion->id }}"
                                    value="{{ $promotion->id }}" name="promotions[]">
                    </div>
                </div>
            @endforeach
        </div>
        <br>

        <button type="submit" class="btn btn-success">Create the Module</button>
    </form>   

@endsection




