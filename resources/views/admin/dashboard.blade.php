@extends('layout')

@section('title', 'Tableau de Bord')

@section('content')

  <h2 class="text-center font-weight-bold text-primary text-uppercase">Statistique Générale</h2>
<section id="minimal-statistics">
  <div class="card">
    <div class="card-title">
    </div>
    <div class="card-body">
      <div class="row">
        <!-- Card 1: Nombre d'offres de formation -->
        <div class="col-xl-3 col-sm-6 col-12">
          <div class="card shadow-lg border-left-primary">
            <div class="card-content">
              <div class="card-body">
                <div class="media d-flex">
                  <div class="align-self-center">
                    <i class="fas fa-book fa-3x text-primary"></i>
                  </div>
                  <div class="media-body text-right">
                    <h3 class="h3 mb-0 font-weight-bold text-gray-800">{{ $cycleCount }}</h3>
                    <span class="text-primary">Formations</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Card 2: Nombre de filières -->
        <div class="col-xl-3 col-sm-6 col-12">
          <div class="card shadow-lg border-left-success">
            <div class="card-content">
              <div class="card-body">
                <div class="media d-flex">
                  <div class="align-self-center">
                    <i class="fas fa-graduation-cap fa-3x text-success"></i>
                  </div>
                  <div class="media-body text-right">
                    <h3 class="h3 mb-0 font-weight-bold text-gray-800">{{ $sectorCount }}</h3>
                    <span class="text-success">Filières</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Card 3: Nombre d'étudiants -->
        <div class="col-xl-3 col-sm-6 col-12">
          <div class="card shadow-lg border-left-info">
            <div class="card-content">
              <div class="card-body">
                <div class="media d-flex">
                  <div class="align-self-center">
                    <i class="fas fa-user-graduate fa-3x text-info"></i>
                  </div>
                  <div class="media-body text-right">
                    <h3 class="h3 mb-0 font-weight-bold text-gray-800">120</h3>
                    <span class="text-info">Étudiants</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Card 4: Nombre de professeurs -->
        <div class="col-xl-3 col-sm-6 col-12">
          <div class="card shadow-lg border-left-warning">
            <div class="card-content">
              <div class="card-body">
                <div class="media d-flex">
                  <div class="align-self-center">
                    <i class="fas fa-chalkboard-teacher fa-3x text-warning"></i>
                  </div>
                  <div class="media-body text-right">
                    <h3 class="h3 mb-0 font-weight-bold text-gray-800">15</h3>
                    <span class="text-warning">Professeurs</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>





<hr class="my-4">

<h2 class="text-center font-weight-bold text-primary text-uppercase mb-4">Offre des Formations</h2>
<div class="card">

  <div class="card-body">
    <div class="row">
      <!-- Loop through all cycles -->
      @foreach ($cycles as $index => $cycle)
      <div class="col-md-4 mb-4">
        <div class="card shadow h-100" style="border-left: 5px solid {{ $index % 2 == 0 ? '#007bff' : '#28a745' }};">
          <div class="card-body">
            <h5 class="card-title font-weight-bold text-primary">{{ $cycle->name }}</h5>
            <p class="card-text text-gray-800">
              {{ Str::limit($cycle->description, 100, '...') }}
            </p>
            <a href="{{ route('admin.cycle.show', $cycle->id) }}" class="btn btn-primary btn-sm">
              <i class="fas fa-eye"></i> Voir Détails
            </a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection