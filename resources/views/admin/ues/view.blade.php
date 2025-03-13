@extends('layout')

@section( 'title', 'Détail de l\'unité')

@section('content')

<div class="container mt-5">
    <div class="card">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary btn-sm" href="{{ route('admin.ue.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
        
        <div class="card-body">
            <h5 class="card-title">Code: {{ $ue->code }}</h5>
            <h5 class="card-title">Intitulé: {{ $ue->name_ue }}</h5>
            <p class="card-title">Crédits: {{ $ue->credit }}</p>
            <p class="card-title">Heures cours Magistraux: {{ $ue->hCM }}h</p>
            <p class="card-title">Heures Travaux Dirigés: {{ $ue->hTD }}h</p>
            <p class="card-title">Heures Travaux Pratiques: {{ $ue->hTP }}h</p>
            <p class="card-text">Créé Depuis: {{ $ue->created_at->format('d-m-Y') }}</p>
        </div>
    </div>
</div>

@endsection