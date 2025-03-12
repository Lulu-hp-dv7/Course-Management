@extends('layout')

@section('title', $level->exists? "Editer le Niveau" : "Ajouter le Niveau")

@section('content')
<div class="card mt-5">
    
    <div class="card-body">
    
      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
          <a class="btn btn-primary btn-sm" href="{{route("admin.level.index") }}"><i class="fa fa-arrow-left"></i> Back</a>
      </div>
    
      <form action="{{ route($level->exists? 'admin.level.update' : 'admin.level.store', $level->id) }}" method="POST">
          @csrf
          @method($level->exists ? 'PUT' : 'POST')
   
            <div class="mb-3">
                @include('components.label', [
                    'label' => 'nom',
                    'class' => 'form-label',
                    'name' => "name", 
                    'type' => "text" ,
                    'value' => $level->name,
                    'placeholder' => "Nom du Niveau"
                ])
            </div>
            <div class="mb-3">
                @include('components.label', [
                    'label' => 'numéro',
                    'class' => 'form-label',
                    'name' => "number", 
                    'type' => "number" ,
                    'value' => $level->number,
                    'placeholder' => "Numéro du Niveau"
                ])
            </div>
            <div class="mb-3">
                @include('components.select', [
                    'label' => 'Choix du Cycle',
                    'class' => 'form-label',
                    'name' => "cycle_id", 
                    'id' => $level->cycle_id,
                    'items' => $cycles
                ])

            </div>
           

            @if($errors->any())
                {!! implode('', $errors->all('<div>:message</div>')) !!}
            @endif
         
          <button type="submit" class="btn btn-success">
            <i class="fa-solid fa-floppy-disk"></i> 

            @if ($level->exists)
                Sauvegarder les modifications
            @else
                Ajouter
            @endif
            
        </button>
      </form>
    
    </div>
  </div>
@endsection