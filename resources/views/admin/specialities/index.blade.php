@extends('layout')

@section( 'title', 'Liste des Spécialités')

@section('content')

    @session('success')
        <div class="alert alert-success" role="alert"> {{ $value }} </div>
    @endsession
   
    <table class="table table-bordered table-striped mt-4">
        <thead>
            <tr>
                <th colspan="3">
                    <a class="btn btn-success" href="{{ route("admin.speciality.create")}}"><i class="fa fa-plus"></i> Ajouter Un Niveau</a>
                    <a class="btn btn-warning" href="#"><i class="fa fa-download"></i> Export</a>
                </th>
            </tr>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Types</th>
                <th>Sector ID</th>
                <th>Operations</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($specialities as $sp)
            <tr>
                <td>{{ $sp->code_sp }}</td>
                <td>{{ $sp->name_sp }}</td>
                <td>{{ $sp->type }}</td>
                <td>{{ $sp->sector_id }}</td>
                <td>
                    <form action="{{ route('admin.speciality.destroy',$sp->id) }}" method="POST">
                        <a class="btn btn-info btn-sm" href="{{ route("admin.speciality.show",$sp->id) }}"><i class="fas fa-eye"></i> Détails</a>
                
                        <a class="btn btn-primary btn-sm" href="{{ route("admin.speciality.edit",$sp->id) }}"><i class="fas fa-pen"></i> Modifier</a>
                    
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