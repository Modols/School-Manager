@extends('layouts.app')

@section('title')
Promotion Details
@endsection

@section('body-title')
Promotion Details 
@endsection



@section('content')
    <br>
    <div class="d-flex flex-row-reverse mb-3">
        <a class="btn btn-danger text-white" style="margin-left: 4px" href="{{ route('promotions.create') }}">Delete</a>
        <a class="btn btn-success text-white"  href="{{ route('promotions.edit', ['promotion' => $promotion]) }}">Edit</a>
    </div>

    <div class="card mb-4" >
        <div class="row g-0">
          <div class="col-md-4">
            <img src="https://media-exp1.licdn.com/dms/image/C4D0BAQEtPcuS0jOZwg/company-logo_200_200/0/1523001943274?e=2159024400&v=beta&t=fIaMqQiFChNjs325flIBsQ0p3JNvACKoatsoQzNvlWc" class="card-img-top" alt="Ynov Picture" >
          </div>
          <div class="col-md-8 text-center" style="margin-top: 10%">
            <div class="card-body">
              <h5 class="card-title">{{ $promotion->name }} | {{ $promotion->speciality }}</h5><br>
              {{-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> --}}
              <p class="card-text"><small class="text-muted">Create the : {{ $promotion->created_at }}</small></p>
              <p class="card-text"><small class="text-muted">Updated the : {{ $promotion->updated_at }}</small></p>
            </div>
          </div>
        </div>
    </div>

    
    @if (isset($promotion->modules[0]))
        <h2 class="mb-4">List of Modules : </h2>
    @endif

    <div class="row">
        @foreach ( $promotion->modules as $module)
            <div class="col-sm-6  text-center" >
                <div class="card mb-4">
                    <div class="card-body">
                    <h5 class="card-title">{{ $module->name }}</h5>
                    <p class="card-text">{{ $module->description }}</p>
                    <a href="#" class=" btn btn-info text-white">Show Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @if (isset($promotion->students[0]))
        <h2 class="mb-4">List of Students : </h2>
    @endif

    <div class="row">
        @foreach ( $promotion->students as $student)
            <div class="col-xl-4 mb-4 text-center">
                <div class="card" style="width: 20rem;">
                    <img src="data:image/jpeg;base64,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"  class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><b>{{ $student->name }}</b> {{ $student->firstName }}</h5>
                        <p class="card-text">{{ $student->email }}</p>
                        <a href="#" class="btn btn-info text-white">Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection




