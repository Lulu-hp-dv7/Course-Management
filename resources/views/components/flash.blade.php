@session('success')
    <div class="alert alert-success" role="alert"> {{ $value }} </div>
@endsession

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="my-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif