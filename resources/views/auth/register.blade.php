@extends('layout-auth')

@section( 'title', 'Enregistrement')

@section('content')

<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-lg-6 d-none d-lg-block bg-login-image">
          <img src="{{ asset('images/register.jpg') }}" alt="Welcome Image" class="img-fluid">
      </div>

        <div class="col-lg-6">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Créer un utilisateur!</h1>
            </div>
            <form class="user">
              <div class="form-group">
                @include('components.input', [
                  'type' => 'name',
                  'classInput' => 'form-control-user',
                  'name' => 'name',
                  'placeholder' => 'Nom de l\'utilisateur',
                ])
                @error('name')
                    <p class="form-text text-danger">{{$message}}</p>
                @enderror
              </div>
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
              <div class="form-group">
                @include('components.input', [
                  'type' => 'password',
                  'classInput' => 'form-control-user',
                  'name' => 'confirmpassword',
                  'placeholder' => 'Confirmer le mot de pass',
                ])
              </div>
              <button type="submit" class="btn btn-primary btn-user btn-block">Inscrire</button>
            </form>
            
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection