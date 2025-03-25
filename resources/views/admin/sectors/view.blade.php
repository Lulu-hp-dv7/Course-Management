@extends('layout')

@section( 'title', 'Détail de la Filière')

@section('content')

@php
    $levelOfSector = $sector->levels()->pluck('name', 'id');
@endphp

<div class="container mt-5">
    <div class="card">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary btn-sm" href="{{ route('admin.sector.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $sector->name_sec }}</h5>
            <p class="card-title">code: {{ $sector->code_sec }}</p>
            <p class="card-text">Créé Depuis: {{ $sector->created_at->format('d-m-Y') }}</p>
            <ul class="list-group list-group-flush">
                @foreach ($sector->specialities as $speciality)
                    <li class="list-group-item">
                        <a class="btn link-info" href="{{route("admin.speciality.show",$speciality->id)}}">
                            {{$speciality->name_sp}}
                        </a>
                    </li>
                @endforeach
            </ul>
            <h4 class="card-title">Niveau: </h4>
            <ul style="list-style: list">
                @foreach ($levelOfSector as $id => $name)
                    <li><a href="{{route("admin.level.show",$id)}}">{{ $name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

@endsection