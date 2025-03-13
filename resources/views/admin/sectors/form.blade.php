@extends('layout')

@section('title', $sector->exists? "Editer la Filière" : "Ajouter la Filière")

@section('content')
<div class="card mt-5">
    
    <div class="card-body">
    
      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
          <a class="btn btn-primary btn-sm" href="{{route("admin.sector.index") }}"><i class="fa fa-arrow-left"></i> Back</a>
      </div>
    
      <form action="{{ route($sector->exists? 'admin.sector.update' : 'admin.sector.store', $sector->id) }}" method="POST">
          @csrf
          @method($sector->exists ? 'PUT' : 'POST')
   
            <div class="mb-3">
                @include('components.label', [
                    'label' => 'Code',
                    'class' => 'form-label',
                    'name' => "code_sec", 
                    'type' => "text" ,
                    'value' => $sector->code_sec,
                    'placeholder' => "Code"
                ])
            </div>
            <div class="mb-3">
                @include('components.label', [
                    'label' => 'Nom',
                    'class' => 'form-label',
                    'name' => "name_sec", 
                    'type' => "text" ,
                    'value' => $sector->name_sec,
                    'placeholder' => "Nom du Niveau"
                ])
            </div>
            <div class="mb-3">
                @include('components.label', [
                    'label' => 'Description',
                    'class' => 'form-label',
                    'name' => "desc_sec", 
                    'value' => $sector->desc_sec,
                    'placeholder' => "Description"
                ])
            </div>
            <div class="mb-3">
                @include('components.select', [
                    'multiple' => true,
                    'label' => 'Niveau de la Flière',
                    'class' => 'form-label',
                    'name' => "levels", 
                    'sectorsIds' => $sector->levels()->pluck('id'),
                    'items' => $levels
                ])

            </div>
           

            @if($errors->any())
                {!! implode('', $errors->all('<div>:message</div>')) !!}
            @endif
         
          <button type="submit" class="btn btn-success">
            <i class="fa-solid fa-floppy-disk"></i> 

            @if ($sector->exists)
                Sauvegarder les modifications
            @else
                Ajouter
            @endif
            
        </button>
      </form>
    
    </div>
  </div>
@endsection