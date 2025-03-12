@extends('layout')

@section( 'title', 'Liste des Niveau')

@section('content')

    @session('success')
        <div class="alert alert-success" role="alert"> {{ $value }} </div>
    @endsession
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <table class="table table-bordered table-striped mt-4">
        <thead>
            <tr>
                <th colspan="3">
                    <a class="btn btn-success" href="{{ route("admin.level.create")}}"><i class="fa fa-plus"></i> Ajouter Un Niveau</a>
                    <a class="btn btn-warning" href="#"><i class="fa fa-download"></i> Export</a>
                </th>
            </tr>
            <tr>
                <th>Name</th>
                <th>Number</th>
                <th>Cycle ID</th>
                <th>Operations</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($levels as $post)
            <tr>
                <td>{{ $post->name }}</td>
                <td>{{ $post->number }}</td>
                <td>{{ $post->cycle_id }}</td>
                <td>
                    <form action="{{ route('admin.level.destroy',$post->id) }}" method="POST">
                        <a class="btn btn-info btn-sm" href="{{ route("admin.level.show",$post->id) }}"><i class="fas fa-eye"></i> Détails</a>
                
                        <a class="btn btn-primary btn-sm" href="{{ route("admin.level.edit",$post->id) }}"><i class="fas fa-pen"></i> Modifier</a>
                    
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Supprimer</button>
                    </form>
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="2">There are no data.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection