@extends('layout')

@section('title', $speciality->exists? "Editer la Spécialité" : "Ajouter la Spécialité")

@section('content')
<div class="card mt-5">
    
    <div class="card-body">
    
      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
          <a class="btn btn-primary btn-sm" href="{{route("admin.speciality.index") }}"><i class="fa fa-arrow-left"></i> Back</a>
      </div>
    
      <form action="{{ route($speciality->exists? 'admin.speciality.update' : 'admin.speciality.store', $speciality->id) }}" method="POST">
          @csrf
          @method($speciality->exists ? 'PUT' : 'POST')
   
            <div class="mb-3">
                @include('components.label', [
                    'label' => 'Code',
                    'class' => 'form-label',
                    'name' => "code_sp", 
                    'type' => "text" ,
                    'value' => $speciality->code_sp,
                    'placeholder' => "Code Spécialité"
                ])
            </div>
            <div class="mb-3">
                @include('components.label', [
                    'label' => 'Nom Spécialité',
                    'class' => 'form-label',
                    'name' => "name_sp", 
                    'type' => "text" ,
                    'value' => $speciality->name_sp,
                    'placeholder' => "Nom Spécialité"
                ])
            </div>
            <div class="mb-3">
                @include('components.label', [
                    'label' => 'type Formation',
                    'class' => 'form-label',
                    'name' => "type", 
                    'type' => "text" ,
                    'value' => $speciality->type,
                    'placeholder' => "ex.: Technicien"
                ])
            </div>
            <div class="mb-3">
                @include('components.label', [
                    'label' => 'Description Spécialité',
                    'class' => 'form-label',
                    'name' => "desc_sp", 
                    'value' => $speciality->desc_sp,
                    'placeholder' => "Description Spécialité"
                ])

            </div>
            <div class="mb-3">
                @include('components.select', [
                    'label' => 'Filière correspondante',
                    'class' => 'form-label',
                    'name' => "sector_id", 
                    'id' => $speciality->sector_id,
                    'items' => $sectors
                ])

            </div>
            <div class="mb-3">
                @include('components.label', [
                    'label' => 'Nombres heures cours magistral',
                    'class' => 'form-label',
                    'name' => 'hCM',
                    'type' =>'number',
                    'value' => $speciality->hCM,
                    'placeholder' => "Nombres heures"
                ])
            </div>
            <div class="mb-3">
                @include('components.label', [
                    'label' => 'Nombres heures de TD',
                    'class' => 'form-label',
                    'name' => 'hTD',
                    'type' =>'number',
                    'value' => $speciality->hTD,
                    'placeholder' => "Nombres heures"
                ])
            </div>

            <div class="mb-3">
                @include('components.label', [
                    'label' => 'Nombres heures de TP',
                    'class' => 'form-label',
                    'name' => 'hTP',
                    'type' =>'number',
                    'value' => $speciality->hTP,
                    'placeholder' => "Nombres heures"
                ])
            </div>
           

            @if($errors->any())
                {!! implode('', $errors->all('<div>:message</div>')) !!}
            @endif
         
          <button type="submit" class="btn btn-success">
            <i class="fa-solid fa-floppy-disk"></i> 

            @if ($speciality->exists)
                Sauvegarder les modifications
            @else
                Ajouter
            @endif
            
        </button>
      </form>
    
    </div>
  </div>
@endsection