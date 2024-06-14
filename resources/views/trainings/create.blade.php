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
                <div class="form-label">Upload Sertifikat</div>
                <input name="certificate" type="file" class="form-control" />
            </div>
        </div>
        <div class="card-footer text-end">
            <div class="d-flex">
                <a href="{{ route('dashboard') }}" class="btn btn-link">Kembali</a>
                <button type="submit" class="btn btn-primary ms-auto">Kirim</button>
            </div>
        </div>
    </form>
@endsection