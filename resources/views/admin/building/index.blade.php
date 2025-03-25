@extends('layout')

@section( 'title', 'Liste des Batiments')

@section('content')

    
    @session('success')
        <div class="alert alert-success" role="alert"> {{ $value }} </div>
    @endsession
   
    <table class="table table-bordered table-striped mt-4">
        <thead>
            <tr>
                <th colspan="3">
                    <a class="btn btn-success" href="{{ route("admin.building.create")}}"><i class="fa fa-plus"></i>Ajouter Un Batiment</a>
                    <a class="btn btn-warning" href="{{ route("admin.building.export")}}"><i class="fa fa-download"></i>Exporter</a>
                </th>
            </tr>
            <tr>
                <th>ID</th>
                <th>Code</th>
                <th>Lieu</th>
                <th>Operations</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($buildings as $class)
            <tr>
                <td>{{ $class->id }}</td>
                <td>{{ $class->code_build }}</td>
                <td>{{ $class->place }}</td>
                <td>
                    <form action="{{ route('admin.building.destroy',$class->id) }}" method="POST">
                        <a class="btn btn-info btn-sm" href="{{ route("admin.building.show",$class->id) }}"><i class="fas fa-eye"></i> Show</a>
                
                        <a class="btn btn-primary btn-sm" href="{{ route("admin.building.edit",$class->id) }}"><i class="fas fa-pen"></i> Edit</a>
                    
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Supprimer</button>
                    </form>
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="3">There are no data.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $buildings->links() }}
    <h2>Importation du fichier Excel</h2>
    
    <form action="{{route("admin.building.import")}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="input-group mt-2">
            <input class="custom-file form-control-file border" type="file" name="csv_file" id="csv_file">
        </div>
        <div class="mt-2">
            <button class="btn btn-primary" type="submit">Importer</button>
        </div>
    </form>
@endsection