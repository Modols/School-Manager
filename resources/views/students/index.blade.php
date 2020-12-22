@extends('layouts.app')

@section('title')
Student List
@endsection

@section('body-title')
Student List 
@endsection

@section('content')
    <div class="d-flex flex-row-reverse">
        <a class="btn btn-lg btn-info text-white" href="{{ route('students.create') }}">Create Student</a>
    </div>
    <br>
    
    <div class="row">

        @if($search)
            <h2 class="mb-5">Search result for "{{ $search }}" : </h2>

            @include('students.parts.listStudent', ['collection'=>$studentsSearch, 'button'=> 'yes'])

        @else
            <h1 class="mb-5">Free Student : </h1>
            @include('students.parts.listStudent', ['collection'=>$freestudents, 'button'=> 'yes'])

            @foreach ($promotions as $promotion)
                <h1 class="mb-5">{{ $promotion['promotionNameSpeciality'] }} :</h1>
                @include('students.parts.listStudent', ['collection'=>$promotion['student'], 'button'=> 'yes'])
            @endforeach

        @endif
    </div>

@endsection




