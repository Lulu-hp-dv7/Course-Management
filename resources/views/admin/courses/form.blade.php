@extends('layout')

@section('title', $course->exists? "Editer le cours" : "Ajouter le cours")

@section('content')
<div class="card mt-5">
    
    <div class="card-body">
    
      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
          <a class="btn btn-primary btn-sm" href="{{route("admin.course.index") }}"><i class="fa fa-arrow-left"></i> Back</a>
      </div>
    
      <form action="{{ route($course->exists? 'admin.course.update' : 'admin.course.store', $course->id) }}" method="POST">
          @csrf
          @method($course->exists ? 'PUT' : 'POST')
   
            <div class="mb-3">
                @include('components.label', [
                    'label' => 'Code du cours',
                    'class' => 'form-label',
                    'name' => "code_course", 
                    'type' => "text" ,
                    'value' => $course->code_course,
                    'placeholder' => "Code du cours"

                ])
            </div>
            <div class="mb-3">
                @include('components.label', [
                    'label' => 'Nom',
                    'class' => 'form-label',
                    'name' => "name_course", 
                    'type' => "text" ,
                    'value' => $course->name_course,
                    'placeholder' => "intitullé du cours"
                ])
            </div>
            <div class="mb-3">
                 @include('components.select', [
                    'label' => 'Type de cours',
                    'class' => 'form-label',
                    'name' => "type_course", 
                    'value' => $course->type_course,
                    'items' => ['COMMUN' => 'COMMUN', 'SPECIALITE' =>'SPECIALITE']
                ])
            </div>
            <div class="mb-3">
                @include('components.label', [
                    'label' => 'Description',
                    'class' => 'form-label',
                    'name' => "desc_course", 
                    'value' => $course->desc_course,
                    'placeholder' => "Description"
                ])
            </div>

            <div class="mb-3">
                @include('components.select', [
                    'multiple' => true,
                    'label' => 'Niveau de la Flière',
                    'class' => 'form-label',
                    'name' => "ues", 
                    'sectorsIds' => $course->ues()->pluck('id'),
                    'items' => $ues
                ])
            </div>
           
            
           

            @if($errors->any())
                {!! implode('', $errors->all('<div>:message</div>')) !!}
            @endif
         
          <button type="submit" class="btn btn-success">
            <i class="fa-solid fa-floppy-disk"></i> 

            @if ($course->exists)
                Sauvegarder les modifications
            @else
                Ajouter
            @endif
            
        </button>
      </form>
    
    </div>
  </div>
@endsection