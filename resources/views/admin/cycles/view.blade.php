@extends('layout')

@section( 'title', 'Liste des formations')

@section('content')

<div class="container mt-5">
    <div class="card">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary btn-sm" href="{{ route('admin.cycle.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
        <div class="card-header">
            Détails du Cycle
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $cycle->name }}</h5>
            <p class="card-title">Code: {{ $cycle->code }}</p>
            <p class="card-text">Description: {{ $cycle->description }}</p>
            <p class="card-text">Nombre d'année: {{ $cycle->nb_level }}</p>
            <p class="card-text">Créé Depuis: {{ $cycle->created_at->format('d-m-Y') }}</p>
        </div>
        @if ($cycle->levels)
            <h4>Liste des Niveau</h4>
            <ul class="list-group list-group-flush">
                @foreach ($cycle->levels as $level)
                    <li class="list-group-item">
                        <a class="btn link-info" href="{{route("admin.level.show",$level->id)}}">
                            {{$level->name}}
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</div>

@endsection