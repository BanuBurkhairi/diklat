@extends('layouts.app')

@section('page-title')
    Edit Diklat
@endsection

@section('page-header')
    <div class="row g-2 align-items-center">
        <div class="col">
            <h2 class="page-title">
                Ubah Diklat
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
    <form class="card" method="POST" action="{{ route('trainings.update', $training->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label">Nama Pelatihan</label>
                <input type="text" class="form-control" name="title" value="{{ old('title', $training->title) }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Jam Pelajaran (JP)</label>
                <input type="number" class="form-control" name="duration" value="{{ old('title', $training->duration) }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Tanggal Pelatihan</label>
                <input name="tanggal_pelatihan" type="date" class="form-control" value="{{ old('title', $training->tanggal_pelatihan) }}">
            </div>
            <div class="mb-3">
                <div class="form-label">Upload Sertifikat</div>
                <input name="certificate" type="file" class="form-control" />
                <small class="form-hint">
                    <a class="btn-link" href="{{ $training->certificate_url }}">File Sertifikat Saat Ini</a>
                    || Tidak perlu upload ulang apabila tidak ingin diubah
                </small>
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