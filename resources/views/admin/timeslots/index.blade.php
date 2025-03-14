@extends('layout')

@section( 'title', 'Liste des Créneaux')

@section('content')

    @session('success')
        <div class="alert alert-success" role="alert"> {{ $value }} </div>
    @endsession
   
    <table class="table table-bordered table-striped mt-4">
        <thead>
            <tr>
                <th colspan="3">
                    <a class="btn btn-success" href="{{ route("admin.timeslot.create")}}"><i class="fa fa-plus"></i> Ajouter Un Créneau</a>
                </th>
            </tr>
            <tr>
                <th>ID</th>
                <th>date</th>
                <th>Heure Debut</th>
                <th>Heure Fin</th>
                <th>Operations</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($timeslots as $time)
            <tr>
                <td>{{ $time->id }}</td>
                <td>{{ $time->date }}</td>
                <td>{{ $time->startTime }}</td>
                <td>{{ $time->endTime }}</td>
                <td>
                    <form action="{{ route('admin.timeslot.destroy',$time->id) }}" method="POST">
                        <a class="btn btn-primary btn-sm" href="{{ route("admin.timeslot.edit",$time->id) }}"><i class="fas fa-pen"></i> Modifier</a>
                    
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Supprimer</button>
                    </form>
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="5">There are no data.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection