@extends('layouts.app')

@section('page-title')
    Diklat Saya
@endsection

@section('page-header')
<div class="row align-items-center">
    <div class="col-auto">
      <span class="avatar avatar-lg rounded" style="background-image: url({{ Auth::user()->profile_photo }})"></span>
    </div>
    <div class="col">
      <h1 class="fw-bold">{{ Auth::user()->name }}</h1>
      
      <div class="list-inline list-inline-dots text-muted">
        <div class="list-inline-item">
          <!-- Download SVG icon from http://tabler-icons.io/i/map -->
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 7l6 -3l6 3l6 -3l0 13l-6 3l-6 -3l-6 3l0 -13" /><path d="M9 4l0 13" /><path d="M15 7l0 13" /></svg>
          Badan Pusat Statistik Kota Gunungsitoli
        </div>
        {{-- <div class="list-inline-item">
          <!-- Download SVG icon from http://tabler-icons.io/i/mail -->
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" /><path d="M3 7l9 6l9 -6" /></svg>
          <a href="#" class="text-reset">dslane3@epa.gov</a>
        </div> --}}
        {{-- <div class="list-inline-item">
          <!-- Download SVG icon from http://tabler-icons.io/i/cake -->
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 20h18v-8a3 3 0 0 0 -3 -3h-12a3 3 0 0 0 -3 3v8z" /><path d="M3 14.803c.312 .135 .654 .204 1 .197a2.4 2.4 0 0 0 2 -1a2.4 2.4 0 0 1 2 -1a2.4 2.4 0 0 1 2 1a2.4 2.4 0 0 0 2 1a2.4 2.4 0 0 0 2 -1a2.4 2.4 0 0 1 2 -1a2.4 2.4 0 0 1 2 1a2.4 2.4 0 0 0 2 1c.35 .007 .692 -.062 1 -.197" /><path d="M12 4l1.465 1.638a2 2 0 1 1 -3.015 .099l1.55 -1.737z" /></svg>
          15/10/1972
        </div> --}}
      </div>
    </div>
    <div class="col-auto ms-auto d-print-none">
      <div class="btn-list">
        <a href="{{ route('dashboard') }}" class="btn">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-back-up"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 14l-4 -4l4 -4" /><path d="M5 10h11a4 4 0 1 1 0 8h-1" /></svg>
          Kembali
        </a>
      </div>
    </div>
</div>
@endsection

@section('konten')

<div class="col">
    <ul class="timeline">
      @foreach ($trainings as $training)
        <li class="timeline-event">
            <div class="timeline-event-icon bg-twitter-lt">
                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-school"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M22 9l-10 -4l-10 4l10 4l10 -4v6" /><path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4" /></svg>
            </div>
            <div class="card timeline-event-card">
                <div class="card-body">
                    <div class="text-muted float-end">
                        @if ($training->certificate_url)
                            <a href="{{ $training->certificate_url }}" target="_blank" class="btn">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-certificate"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 15m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" /><path d="M13 17.5v4.5l2 -1.5l2 1.5v-4.5" /><path d="M10 19h-5a2 2 0 0 1 -2 -2v-10c0 -1.1 .9 -2 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -1 1.73" /><path d="M6 9l12 0" /><path d="M6 12l3 0" /><path d="M6 15l2 0" /></svg>
                                Lihat
                            </a>
                            <button class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                              Actions
                            </button>
                            <div class="dropdown-menu dropdown-menu-arrow">
                              <a class="dropdown-item" href="{{ route('trainings.edit', $training->id) }}">
                                Edit
                              </a>
                              <form action="{{ route('trainings.destroy', $training->id) }}" method="POST" style="display:inline;" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="dropdown-item">
                                  Hapus
                                </button>
                              </form>
                            </div>                            
                        @else
                            No Certificate
                        @endif
                    </div>
                    <h4>{{ $training->title }}</h4>
                    <p class="text-muted">{{ $training->duration }} Jam Pelajaran (JP) || {{ $training->tanggal_pelatihan }}</p>
                </div>
            </div>
        </li>
      @endforeach
    </ul>
</div>

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteForms = document.querySelectorAll('form.delete-form');

        deleteForms.forEach(form => {
            form.addEventListener('submit', function (event) {
                const confirmed = confirm('Apakah Anda yakin ingin menghapus item ini?');
                if (!confirmed) {
                    event.preventDefault();
                }
            });
        });
    });
</script>