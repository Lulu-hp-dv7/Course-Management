@extends('layout')

@section('content')
<div class="card mt-5">
    <h2 class="card-header">Ajouter Un Cycle</h2>
    <div class="card-body">
    
      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
          <a class="btn btn-primary btn-sm" href="{{route("admin.cycle.index") }}"><i class="fa fa-arrow-left"></i> Back</a>
      </div>
    
      <form action="{{ route('admin.cycle.store') }}" method="POST">
          @csrf
    
          <div class="mb-3">
              <label for="inputName" class="form-label"><strong>Title:</strong></label>
              <input 
                  type="text" 
                  name="name" 
                  class="form-control @error('name') is-invalid @enderror"
                  id="inputName" 
                  value="{{ old('name', $cycle->name) }}"
                  placeholder="Nom du cycle">
              @error('name')
                  <div class="form-text text-danger">{{ $message }}</div>
              @enderror
          </div>
    
          <div class="mb-3">
              <label for="inputContent" class="form-label"><strong>Description:</strong></label>
              <textarea 
                  class="form-control @error('description') is-invalid @enderror" 
                  style="height:150px" 
                  name="description" 
                  id="inputContent" 
                  placeholder="Description du cycle">{{ old('description', $cycle->description) }}</textarea>
              @error('description')
                  <div class="form-text text-danger">{{ $message }}</div>
              @enderror
          </div>
          <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Sauvegarder</button>
      </form>
    
    </div>
  </div>
@endsection