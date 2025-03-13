@extends('layout')

@section('title', $ue->exists? "Editer une Unité" : "Ajouter une Unité")

@section('content')
<div class="card mt-5">
    
    <div class="card-body">
    
      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
          <a class="btn btn-primary btn-sm" href="{{route("admin.ue.index") }}"><i class="fa fa-arrow-left"></i> Back</a>
      </div>
      
      <form action="{{ route($ue->exists? 'admin.ue.update' : 'admin.ue.store', $ue->id) }}" method="POST">
          @csrf
          @method($ue->exists ? 'PUT' : 'POST')

          <div class="mb-3">
            @include('components.label', [
                'label' => 'Code',
                'class' => 'form-label',
                'name' => "code", 
                'type' => "text" ,
                'value' => $ue->code,
                'placeholder' => "Code de l'UE"
            ])
            </div>
          
            <div class="mb-3">
                @include('components.label', [
                    'label' => 'Nom',
                    'class' => 'form-label',
                    'name' => "name_ue", 
                    'type' => "text" ,
                    'value' => $ue->name_ue,
                    'placeholder' => "Nom de l'unité"
                ])
            </div>

            <div class="mb-3">
                @include('components.label', [
                    'label' => 'Crédits',
                    'class' => 'form-label',
                    'name' => "credit", 
                    'type' => "number" ,
                    'value' => $ue->credit,
                    'placeholder' => "Crédits"
                ])
            </div>
           
            <div class="mb-3">
                @include('components.label', [
                    'label' => 'Heures Cours Magistraux',
                    'class' => 'form-label',
                    'name' => "hCM", 
                    'type' => "number" ,
                    'value' => $ue->hCM,
                    'placeholder' => "Heures Cours Magistraux"
                ])
            </div>

            <div class="mb-3">
                @include('components.label', [
                    'label' => 'Heures Travaux dirigés',
                    'class' => 'form-label',
                    'name' => "hTD",
                    'type' => "number" ,
                    'value' => $ue->hTD,
                    'placeholder' => "Heures Travaux dirigés"
                ])
            </div>
    
            <div class="mb-3">
                @include('components.label', [
                    'label' => 'Heures Travaux Praique',
                    'class' => 'form-label',
                    'name' => "hTP", 
                    'type' => "number" ,
                    'value' => $ue->hTP,
                    'placeholder' => "Heures Travaux Praique"
                ])
            </div>

            <div class="mb-3">
                @include('components.select', [
                    'label' => 'Choix du Semestre',
                    'class' => 'form-label',
                    'name' => "semester_id", 
                    'id' => $ue->semester_id,
                    'items' => $semesters
                ])

            </div>

          <button type="submit" class="btn btn-success">
            <i class="fa-solid fa-floppy-disk"></i> 

            @if ($ue->exists)
                Sauvegarder les modifications
            @else
                Ajouter
            @endif
            
        </button>
      </form>
    
    </div>
  </div>
@endsection