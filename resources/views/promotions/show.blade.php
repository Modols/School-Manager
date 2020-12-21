@extends('layouts.app')

@section('title')
Promotion Detail
@endsection

@section('body-title')
Promotion Detail
@endsection



@section('content')
    <br>
    <div class="d-flex flex-row-reverse mb-3">
        <div>
            <a class="btn btn-success text-white"  href="{{ route('promotions.edit', ['promotion' => $promotion]) }}">Edit</a>
        </div>
        <div>
            <form method="POST" action="{{route('promotions.destroy', ['promotion' => $promotion] )}}" style="margin-right: 10px">
                @method("DELETE")
                @csrf
                <button class=" btn btn-danger text-white">Delete</button>
            </form>
        </div>
        <div>
            <form method="POST" action="{{route('promotions.destroy', ['promotion' => $promotion, 'deleteAll' => 'true'] )}}" style="margin-right: 10px">
                @method("DELETE")
                @csrf
                <button class=" btn btn-danger text-white">Delete Everythings *</button>
            </form>
        </div>
    </div>

    <div class="card mb-4" >
        <div class="row g-0">
          <div class="col-md-4">
            <img src="https://media-exp1.licdn.com/dms/image/C4D0BAQEtPcuS0jOZwg/company-logo_200_200/0/1523001943274?e=2159024400&v=beta&t=fIaMqQiFChNjs325flIBsQ0p3JNvACKoatsoQzNvlWc" class="card-img-top" alt="Ynov Picture" >
          </div>
          <div class="col-md-8 text-center" style="margin-top: 10%">
            <div class="card-body">
              <h5 class="card-title">{{ $promotion->name }} | {{ $promotion->speciality }}</h5><br>
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
        @include('modules.parts.listModule', ['collection'=>$promotion->modules])
    </div>

    @if (isset($promotion->students[0]))
        <h2 class="mb-4">List of Students : </h2>
    @endif

    <div class="row mb-4">
        @include('students.parts.listStudent', ['collection'=>$promotion->students, 'button'=> 'no'])
    </div>

    <p>* Delete Everythings means delete the promotion and the promotion's students.</p>

@endsection




