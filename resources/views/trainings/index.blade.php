@extends('layouts.app')

@section('page-title')
    Dashboard Diklat Pegawai
@endsection

@section('page-header')
    <div class="row g-2 align-items-center">
        <div class="col">
        <!-- Page pre-title -->
        <div class="page-pretitle">
            Selamat Datang
        </div>
        <h2 class="page-title">
            {{ Auth::user()->name }}
        </h2>
        </div>
        <!-- Page title actions -->
        <div class="col-auto ms-auto d-print-none">
            <div class="btn-list">
                <span class="d-none d-sm-inline">
                    <a href="{{ route('trainings.user') }}" class="btn">
                        Diklat Saya
                    </a>
                </span>
                <a href="{{ route('trainings.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
                        Tambah Diklat
                </a>
                <a href="{{ route('trainings.user') }}" class="btn d-sm-none btn-icon">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-school"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M22 9l-10 -4l-10 4l10 4l10 -4v6" /><path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4" /></svg>
                </a>
            <a href="{{ route('trainings.create') }}" class="btn btn-primary d-sm-none btn-icon">
                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
            </a>
            <form method="get" action="{{ route('trainings.index') }}">
                <select name="year" class="form-select" onchange="this.form.submit()">  
                    @foreach ($years as $year)  
                        <option value="{{ $year }}" {{ $year == $selectedYear ? 'selected' : '' }}>  
                            {{ $year }}  
                        </option>  
                    @endforeach  
                </select>  
            </form>
        </div>
        </div>
    </div>
@endsection

@section('konten')

    <div class="col-md-4">
        <div class="card">
        <div class="card-body">
            <div class="subheader">Diklat Saya</div>
            <div class="h3 m-0">{{ $currentYearTrainings->count() }}</div>
        </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
        <div class="card-body">
            <div class="subheader">Jumlah JP</div>
            <div class="h3 m-0">{{ $currentYearTrainings->sum('duration') }}</div>
        </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
        <div class="card-body">
            <div class="subheader">Realisasi JP</div>
            <div class="h3 m-0">{{ round(($currentYearTrainings->sum('duration') / 20) * 100, 2) }}%</div>
        </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <h3 class="card-title">Jumlah Jam Pelajaran Per Pegawai</h3>
                </div>
                <div id="chart-tasks-overview"></div>
            </div>
        </div>
    </div>


@endsection

@section('skrip')
<script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function () {
        const employees = @json($employees);

        const names = employees.map(emp => emp.name.split(' ')[0]);
        const jp = employees.map(emp => emp.jp);
        window.ApexCharts && (new ApexCharts(document.getElementById('chart-tasks-overview'), {
            chart: {
                type: "bar",
                fontFamily: 'inherit',
                height: 320,
                parentHeightOffset: 0,
                toolbar: {
                    show: false,
                },
                animations: {
                    enabled: false
                },
            },
            plotOptions: {
                bar: {
                    columnWidth: '50%',
                }
            },
            dataLabels: {
                enabled: false,
            },
            fill: {
                opacity: 1,
            },
            series: [{
                name: "A",
                data: jp
            }],
            tooltip: {
                theme: 'dark'
            },
            grid: {
                padding: {
                    top: -20,
                    right: 0,
                    left: -4,
                    bottom: -4
                },
                strokeDashArray: 4,
            },
            xaxis: {
                labels: {
                    padding: 0,
                },
                tooltip: {
                    enabled: false
                },
                axisBorder: {
                    show: false,
                },
                categories: names,
            },
            yaxis: {
                labels: {
                    padding: 4
                },
            },
            colors: [tabler.getColor("primary")],
            legend: {
                show: false,
            },
        })).render();
    });
    // @formatter:on
</script>
@endsection