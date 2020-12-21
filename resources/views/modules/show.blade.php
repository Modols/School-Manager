@extends('layouts.app')

@section('title')
Module Detail
@endsection

@section('body-title')
Module Detail 
@endsection

@section('content')

    <br>
    <div class="d-flex flex-row-reverse mb-3">
        <div>
            <a class="btn btn-success text-white"  href="{{ route('modules.edit', ['module' => $module]) }}">Edit</a>
        </div>
        <div>
            <form method="POST" action="{{route('modules.destroy', ['module' => $module] )}}" style="margin-right: 10px">
                @method("DELETE")
                @csrf
                <button class=" btn btn-danger text-white">Delete</button>
            </form>
        </div>
    </div>
     
    <div class="card text-center mb-3">
        <div class="card-body mb-2">
          <h5 class="card-title ">{{ $module->name }}</h5>
          <p class="card-text">{{ $module->description }}</p>
        </div>
        <div class="card-footer text-muted">
            <b> Create the : </b>{{ $module->created_at }} <br/>
            <b>Last update the : </b>{{ $module->updated_at }}
        </div>
    </div>

    @if (isset($module->promotions[0]))
        <h2 class="mb-4">List of promotions : </h2>
    @endif

    <div class="row">
        @include('promotions.parts.listPromotion', ['collection'=>$module->promotions])
    </div>
      
    @if (isset($module->students[0]))
        <h2 class="mb-4">List of Students : </h2>
    @endif

    <div class="row mb-4">
        @include('students.parts.listStudent', ['collection'=>$module->students, 'button'=> 'no'])
    </div>

@endsection




