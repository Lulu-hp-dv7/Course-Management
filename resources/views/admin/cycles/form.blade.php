@extends('layout')

@section('title', $cycle->exists? "Editer un cycle" : "Ajouter un cycle")

@section('content')
<div class="card mt-5">
    
    <div class="card-body">
    
      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
          <a class="btn btn-primary btn-sm" href="{{route("admin.cycle.index") }}"><i class="fa fa-arrow-left"></i> Back</a>
      </div>
    
      <form action="{{ route($cycle->exists? 'admin.cycle.update' : 'admin.cycle.store', $cycle->id) }}" method="POST">
          @csrf
          @method($cycle->exists ? 'PUT' : 'POST')

          <div class="mb-3">
            @include('components.label', [
                'label' => 'Code',
                'class' => 'form-label',
                'name' => "code", 
                'type' => "text" ,
                'value' => $cycle->code,
                'placeholder' => "Code"
            ])
            </div>
          
            <div class="mb-3">
                @include('components.label', [
                    'label' => 'Nom',
                    'class' => 'form-label',
                    'name' => "name", 
                    'type' => "text" ,
                    'value' => $cycle->name,
                    'placeholder' => "Nom du cycle"
                ])
            </div>

            <div class="mb-3">
                @include('components.label', [
                    'label' => 'Nombre De niveau',
                    'class' => 'form-label',
                    'name' => "nb_level", 
                    'type' => "number" ,
                    'value' => $cycle->nb_level,
                    'placeholder' => "Nombre De niveau"
                ])
            </div>
              
            <div class="mb-3">
                @include('components.label', [
                    'label' => 'Description',
                    'class' => 'form-label',
                    'name' => "description", 
                    'value' => $cycle->description,
                    'placeholder' => "Description du cycle"
                ])
            </div>

          <button type="submit" class="btn btn-success">
            <i class="fa-solid fa-floppy-disk"></i> 

            @if ($cycle->exists)
                Sauvegarder les modifications
            @else
                Ajouter
            @endif
            
        </button>
      </form>
    
    </div>
  </div>
@endsection