@extends('layout')

@section( 'title', 'Détail du niveau')

@section('content')

<div class="container mt-5">
    <div class="card">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary btn-sm" href="{{ route('admin.level.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
        <div class="card-header">
            Détails du Niveau
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $level->name }}</h5>
            <p class="card-title">Numero: {{ $level->number }}</p>
            <p class="card-title">Cycle: <a href="{{route("admin.cycle.show",$level->cycle->id)}}">{{ $level->cycle?->name }}</a></p>
            <p class="card-text">Créé Depuis: {{ $level->created_at->format('d-m-Y') }}</p>
        </div>
    </div>
</div>

@endsection