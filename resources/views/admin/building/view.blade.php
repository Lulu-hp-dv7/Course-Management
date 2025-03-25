@extends('layout')

@section( 'title', 'Détails du Batiment')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary btn-sm" href="{{ route('admin.building.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $building->id }}</h5>
            <p class="card-title">Code: {{ $building->code_build }}</p>
            <p class="card-text">Description: {{ $building->place }}</p>
            <p class="card-text">Créé Depuis: {{ $building->created_at->format('d-m-Y') }}</p>
            @if ($building->classrooms)
            <ul class="list-group list-group-flush">
                <h4>Liste des Salle de classes du batiment</h4>
                @foreach ($building->classrooms as $classroom)
                <li class="list-group-item">
                    <a class="btn link-info" href="{{route("admin.classroom.show",$classroom->id)}}">
                        {{$classroom->code}}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</div>

@endsection