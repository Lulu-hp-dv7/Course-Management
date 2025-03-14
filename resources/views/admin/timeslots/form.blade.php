@extends('layout')

@section('title', $timeslot->exists? "Editer période de cours" : "Ajouter période de cours")

@section('content')
<div class="card mt-5">
    
    <div class="card-body">
    
      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
          <a class="btn btn-primary btn-sm" href="{{route("admin.timeslot.index") }}"><i class="fa fa-arrow-left"></i> Back</a>
      </div>
    
      <form action="{{ route($timeslot->exists? 'admin.timeslot.update' : 'admin.timeslot.store', $timeslot->id) }}" method="POST">
          @csrf
          @method($timeslot->exists ? 'PUT' : 'POST')
   
            <div class="mb-3">
                @include('components.label', [
                    'label' => 'Date du jour',
                    'class' => 'form-label',
                    'name' => "date", 
                    'type' => "date" ,
                    'value' => $timeslot->date,
                ])
            </div>
            <div class="mb-3">
                @include('components.label', [
                    'label' => 'heure Début',
                    'class' => 'form-label',
                    'name' => "startTime", 
                    'type' => "time" ,
                    'value' => $timeslot->startTime,
                    'placeholder' => "heure"
                ])
            </div>
            <div class="mb-3">
                @include('components.label', [
                    'label' => 'heure Fin',
                    'class' => 'form-label',
                    'name' => "endTime", 
                    'type' => "time" ,
                    'value' => $timeslot->endTime,
                    'placeholder' => "heure de la fin"
                ])
            </div>
           
            
           

            @if($errors->any())
                {!! implode('', $errors->all('<div>:message</div>')) !!}
            @endif
         
          <button type="submit" class="btn btn-success">
            <i class="fa-solid fa-floppy-disk"></i> 

            @if ($timeslot->exists)
                Sauvegarder les modifications
            @else
                Ajouter
            @endif
            
        </button>
      </form>
    
    </div>
  </div>
@endsection