@extends('layout')

@section( 'title', 'Détail Spécialité')

@section('content')

<div class="container mt-5">
    <div class="card">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary btn-sm" href="{{ route('admin.speciality.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
        <div class="card-header">
            Détails du Niveau
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $speciality->code_sp }}</h5>
            <p class="card-title">Nom: {{ $speciality->name_sp }}</p>
            <p class="card-title">Type: {{ $speciality->type }}</p>
            <p class="card-title">Filière: <a href="{{route("admin.sector.show",$speciality->sector->id)}}">{{ $speciality->sector?->name_sec }}</a></p>
            <p class="card-text">Créé Depuis: {{ $speciality->created_at->format('d-m-Y') }}</p>
        </div>
    </div>
</div>

@endsection