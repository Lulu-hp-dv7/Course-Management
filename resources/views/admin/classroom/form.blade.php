@extends('layout')

@section('title', $classroom->exists? "Editer le cours" : "Ajouter le cours")

@section('content')
<div class="card mt-5">
    
    <div class="card-body">
    
      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
          <a class="btn btn-primary btn-sm" href="{{route("admin.classroom.index") }}"><i class="fa fa-arrow-left"></i> Back</a>
      </div>
    
      <form action="{{ route($classroom->exists? 'admin.classroom.update' : 'admin.classroom.store', $classroom->id) }}" method="POST">
          @csrf
          @method($classroom->exists ? 'PUT' : 'POST')
            <div class="mb-3">
                @include('components.label', [
                    'label' => 'Nom de la salle',
                    'class' => 'form-label',
                    'name' => "code_class", 
                    'type' => "text" ,
                    'value' => $classroom->code_class,
                    'placeholder' => "ex: A02"

                ])
            </div>
            <div class="mb-3">
                @include('components.label', [
                    'label' => 'Capacité d\'individus',
                    'class' => 'form-label',
                    'name' => "capacity", 
                    'type' => "number" ,
                    'value' => $classroom->capacity,
                    'placeholder' => "Ex: 75"
                ])
            </div>
            <div class="mb-3">
                 @include('components.select', [
                    'label' => 'Type de Salle',
                    'class' => 'form-label',
                    'name' => "type_class", 
                    'value' => $classroom->type_class,
                    'items' => [
                        'AMPHI' => 'AMPHI',
                        'LABO' =>'LABO',
                        'BUREAU' =>'BUREAU',
                        'SALLE' =>'SALLE'
                        ]
                ])
            </div>

            <div class="mb-3">
                @include('components.select', [
                    'label' => 'Batiment',
                    'class' => 'form-label',
                    'name' => "building_id", 
                    'id' => $classroom->building_id,
                    'items' => $buildings
                ])
            </div>
           
            
           

            @if($errors->any())
                {!! implode('', $errors->all('<div>:message</div>')) !!}
            @endif
         
          <button type="submit" class="btn btn-success">
            <i class="fa-solid fa-floppy-disk"></i> 

            @if ($classroom->exists)
                Sauvegarder les modifications
            @else
                Ajouter
            @endif
            
        </button>
      </form>
    
    </div>
  </div>
@endsection