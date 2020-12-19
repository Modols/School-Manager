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
    {{-- <div class="form-group">
        <label for="nom">Nom :</label>
        <input type="text" class="form-control" name="nom" value="{{$promotion->name}}" placeholder="Entrer nom" required>
    </div> --}}

    <h2>List of all Module : </h2>
    @foreach($modules as $module)
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="module-{{ $module->id }}"
                        value="{{ $module->id }}" name="modules[]"
                            @foreach($promotion->modules as $possibleModule)
                                @if($possibleModule->id == $module->id) checked @endif
                            @endforeach
            >
            <label class="form-check-label" for="module-{{ $module->id }}">{{ $module->name }}</label>
        </div>
    @endforeach
   

    <button type="submit" class="btn btn-primary">Modifier</button>
</form>
    

@endsection




