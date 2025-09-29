@extends('layout-auth')

@section( 'title', 'Se Connecter')

@section('content')
  
      <!-- Outer Row -->
      <div class="row justify-content-center">
  
        <div class="col-xl-10 col-lg-12 col-md-9">
  
          <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
              <!-- Nested Row within Card Body -->
              <div class="row">
                <div class="col-lg-6 d-none d-lg-block bg-login-image">
                    <img src="{{ asset('images/welcome.jpg') }}" alt="Welcome Image" class="img-fluid">
                </div>
                <div class="col-lg-6">
                  <div class="p-5">
                    <div class="text-center">
                      <h1 class="h4 text-gray-900 mb-4">Bienvenu!</h1>
                    </div>
                    @include('components.flash')
                    <form class="user" method="POST" action="{{ route('signin') }}">
                      @csrf
                      <div class="form-group">
                        @include('components.input', [
                          'type' => 'email',
                          'classInput' => 'form-control-user',
                          'name' => 'email',
                          'placeholder' => 'Email',
                        ])
                        @error('email')
                            <p class="form-text text-danger">{{$message}}</p>
                        @enderror
                      </div>
                      <div class="form-group">
                        @include('components.input', [
                          'type' => 'password',
                          'classInput' => 'form-control-user',
                          'name' => 'password',
                          'placeholder' => 'Mot de passe',
                        ])
                      </div>
                      
                      <button type="submit" class="btn btn-primary btn-user btn-block">Se connecter</button>
                    </form>
                    <hr>
                    
                    <div class="text-center">
                      <a class="small" href="{{route('admin.register')}}">Enregistrer un Utilisateur !</a>
                    </div>
                    <div class="text-center mt-4">
                      <a href="{{ route('home') }}" class="text-dark font-weight-bold text-decoration-none">
                        Retour à la page d'accueil
                    </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
  
        </div>
  
      </div>
  
@endsection