@extends('layout')

@section( 'title', 'Détails de la séance de course')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary btn-sm" href="{{ route('admin.course.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $course->name_course }}</h5>
            <p class="card-title">Code: {{ $course->code_course }}</p>
            <p class="card-text">Description: {{ $course->desc_course }}</p>
            <p class="card-text">Types: {{ $course->type_course }}</p>
            <p class="card-text">Créé Depuis: {{ $course->created_at->format('d-m-Y') }}</p>
            @if ($course->ues)
            <h4>Liste des Niveau</h4>
            <ul class="list-group list-group-flush">
                @foreach ($course->ues as $eu)
                <li class="list-group-item">
                    <a class="btn link-info" href="{{route("admin.ue.show",$eu->id)}}">
                        {{$eu->name_ue}}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</div>

@endsection