@extends('layouts.app')

@section('page-title')
    Tambah Diklat
@endsection

@section('page-header')
    <div class="row g-2 align-items-center">
        <div class="col">
            <h2 class="page-title">
                Tambah Diklat Baru
            </h2>
        </div>
    </div>
@endsection

@section('konten')
    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
    <form class="card" method="POST" action="{{ route('trainings.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label">Nama Pelatihan</label>
                <input type="text" class="form-control" name="title">
            </div>
            <div class="mb-3">
                <label class="form-label">Jam Pelajaran (JP)</label>
                <input type="number" class="form-control" name="duration">
            </div>
            <div class="mb-3">
                <div class="form-label">Tanggal Pelatihan</div>
                <label class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="radios-inline" id="single-day" value="1">
                    <span class="form-check-label">1 Hari</span>
                </label>
                <label class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="radios-inline" id="multi-day" value="2" checked>
                    <span class="form-check-label">>1 Hari</span>
                </label>
                <div class="row g-2">
                    <div class="col-6" id="start-date-container" style="display: none;">
                        <span class="form-hint">Tanggal Mulai</span>
                        <input id="start-date" name="tanggal_mulai" type="date" class="form-control">
                    </div>
                    <div class="col-6" id="end-date-container">
                        <span class="form-hint">Tanggal Selesai</span>
                        <input id="end-date" name="tanggal_pelatihan" type="date" class="form-control">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <div class="form-label">Upload Sertifikat</div>
                <input name="certificate" type="file" class="form-control" />
            </div>
        </div>
        <div class="card-footer text-end">
            <div class="d-flex">
                <a href="{{ route('dashboard') }}" class="btn">Kembali</a>
                <button type="submit" class="btn btn-primary ms-auto">Kirim</button>
            </div>
        </div>
    </form>
@endsection

@section('skrip')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const singleDayRadio = document.getElementById('single-day');
            const multiDayRadio = document.getElementById('multi-day');
            const startDateContainer = document.getElementById('start-date-container');
            const endDateContainer = document.getElementById('end-date-container');
            const endDateInput = document.getElementById('end-date');

            function toggleDateInputs() {
                if (singleDayRadio.checked) {
                    startDateContainer.style.display = 'none';
                    endDateContainer.classList.remove('col-6');
                    endDateContainer.classList.add('col-12');
                } else {
                    startDateContainer.style.display = 'block';
                    endDateContainer.classList.remove('col-12');
                    endDateContainer.classList.add('col-6');
                }
            }

            // Set initial state based on default checked radio button
            toggleDateInputs();

            // Add event listeners
            singleDayRadio.addEventListener('change', toggleDateInputs);
            multiDayRadio.addEventListener('change', toggleDateInputs);
        });
    </script>
@endsection