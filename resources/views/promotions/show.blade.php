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
        <a class="btn btn-success text-white"  href="{{ route('promotions.create') }}">Edit</a>
    </div>

    {{-- <div class="col-sm-4">
        <div class="card" style="width: 18rem; margin-bottom: 10px; margin-top: 10px;">
            <img src="https://media-exp1.licdn.com/dms/image/C4D0BAQEtPcuS0jOZwg/company-logo_200_200/0/1523001943274?e=2159024400&v=beta&t=fIaMqQiFChNjs325flIBsQ0p3JNvACKoatsoQzNvlWc" class="card-img-top" alt="Ynov Picture" >
            <div class="card-body">
                <h5 class="card-title">{{ $promotion->name }} | {{ $promotion->speciality }}</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <div class="row">
                    <div class="col">
                        <a href="#" class=" btn btn-info text-white">Show Details</a>
                    </div>
                    <div class="col ">
                        <a href="#" class=" btn btn-info text-white">Edit</a>
                        <a href="#" class=" btn btn-info text-white">Delete</a>
                    </div>
                    <div class="col">
                    </div>
                    <a href="#" class=" btn btn-info text-white">Show Details</a>
                </div>
            </div>
        </div>
    </div> --}}

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
    

@endsection




