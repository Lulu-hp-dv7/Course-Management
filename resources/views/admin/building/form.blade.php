@extends('layout')

@section('title', $building->exists? "Editer le Batiment" : "Ajouter Un Batiment")

@section('content')
<div class="card mt-5">
    
    <div class="card-body">
    
      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
          <a class="btn btn-primary btn-sm" href="{{route("admin.building.index") }}"><i class="fa fa-arrow-left"></i> Back</a>
      </div>
    
      <form action="{{ route($building->exists? 'admin.building.update' : 'admin.building.store', $building->id) }}" method="POST">
          @csrf
          @method($building->exists ? 'PUT' : 'POST')
            <div class="mb-3">
                @include('components.label', [
                    'label' => 'Code du batiment',
                    'class' => 'form-label',
                    'name' => "code_build", 
                    'type' => "text" ,
                    'value' => $building->code_build,
                    'placeholder' => "Code du batiment"

                ])
            </div>
            <div class="mb-3">
                @include('components.select', [
                    'label' => 'Emplacement',
                    'class' => 'form-label',
                    'name' => "place", 
                    'value' => $building->place,
                    'items' => ['CampusA' => 'CampusA', 'CampusB' =>'CampusB']
                ])
            </div>          

            @if($errors->any())
                {!! implode('', $errors->all('<div>:message</div>')) !!}
            @endif
         
          <button type="submit" class="btn btn-success">
            <i class="fa-solid fa-floppy-disk"></i> 

            @if ($building->exists)
                Sauvegarder les modifications
            @else
                Ajouter
            @endif
            
        </button>
      </form>
    
    </div>
  </div>
@endsection