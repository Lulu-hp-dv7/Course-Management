@extends('layout')

@section( 'title', 'Liste des formations')

@section('content')

    

    <form action="{{route("admin.cycle.import")}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="input-group mt-2">
            <input class="custom-file form-control-file border" type="file" name="csv_file" id="csv_file">
        </div>
        <div class="mt-2">
            <button class="btn btn-primary" type="submit">Import Users</button>
        </div>
    </form>
    
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
                    <a class="btn btn-success" href="{{ route("admin.cycle.create")}}"><i class="fa fa-plus"></i> Ajouter Un cycle</a>
                    <a class="btn btn-warning" href="{{ route("admin.cycle.export")}}"><i class="fa fa-download"></i> Export</a>
                </th>
            </tr>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Operations</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($cycles as $post)
            <tr>
                <td>{{ $post->name}}</td>
                <td>{{Str::limit($post->description, 50) }}</td>
                <td>
                    <form action="{{ route('admin.cycle.destroy',$post->id) }}" method="POST">
                        <a class="btn btn-info btn-sm" href="{{ route("admin.cycle.show",$post->id) }}"><i class="fas fa-eye"></i> Show</a>
                
                        <a class="btn btn-primary btn-sm" href="{{ route("admin.cycle.edit",$post->id) }}"><i class="fas fa-pen"></i> Edit</a>
                    
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