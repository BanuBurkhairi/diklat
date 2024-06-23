@extends('layouts.app')

@section('page-title')
    Dashboard Diklat BPS Kota Gunungsitoli
@endsection

@section('page-header')
    <div class="row g-2 align-items-center">
        <div class="col">
        <!-- Page pre-title -->
        <div class="page-pretitle">
            Dashboard
        </div>
        <h2 class="page-title">
            Diklat Seluruh Pegawai BPS Kota Gunungsitoli
        </h2>
        </div>
        <!-- Page title actions -->
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

    <div class="col-md-4">
        <div class="card">
        <div class="card-body">
            <div class="subheader">Jumlah Pegawai</div>
            <div class="h3 m-0">{{ $jumlahPegawai }}</div>
        </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
        <div class="card-body">
            <div class="subheader">Jumlah Jam Pelajaran</div>
            <div class="h3 m-0">{{ $jumlahJamPelajaran }}</div>
        </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
        <div class="card-body">
            <div class="subheader">Persentase Jam Pelajaran</div>
            <div class="h3 m-0">{{ round($persentaseJamPelajaran, 2) }}%</div>
        </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <h3 class="card-title">Jumlah Jam Pelajaran Setahun</h3>
                </div>
                <div id="chart-tasks-overview"></div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <h3 class="card-title">Jumlah Jam Pelajaran Per Bulan</h3>
                    <div class="ms-auto">
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle text-muted" data-bs-toggle="dropdown"aria-haspopup="true" aria-expanded="false">
                                @switch($month)
                                    @case('2024-01')
                                        Januari 2024
                                        @break

                                    @case('2024-02')
                                        Februari 2024
                                        @break
                                      
                                    @case('2024-03')
                                        Maret 2024
                                        @break

                                    @case('2024-04')
                                        April 2024
                                        @break
                                        
                                    @case('2024-05')
                                        Mei 2024
                                        @break

                                    @case('2024-06')
                                        Juni 2024
                                        @break
                                    
                                    @case('2024-07')
                                        Juli 2024
                                        @break

                                    @case('2024-08')
                                        Agustus 2024
                                        @break
                                      
                                    @case('2024-09')
                                        September 2024
                                        @break

                                    @case('2024-10')
                                        Oktober 2024
                                        @break
                                        
                                    @case('2024-11')
                                        November 2024
                                        @break

                                    @case('2024-12')
                                        Desember 2024
                                        @break
                                    
                                @endswitch
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item {{ $month == '2024-01' ? 'active' : '' }}" href="{{ route('rekap.index',['month' => '2024-01']) }}">Januari</a>
                                <a class="dropdown-item {{ $month == '2024-02' ? 'active' : '' }}" href="{{ route('rekap.index',['month' => '2024-02']) }}">Februari</a>
                                <a class="dropdown-item {{ $month == '2024-03' ? 'active' : '' }}" href="{{ route('rekap.index',['month' => '2024-03']) }}">Maret</a>
                                <a class="dropdown-item {{ $month == '2024-04' ? 'active' : '' }}" href="{{ route('rekap.index',['month' => '2024-04']) }}">April</a>
                                <a class="dropdown-item {{ $month == '2024-05' ? 'active' : '' }}" href="{{ route('rekap.index',['month' => '2024-05']) }}">Mei</a>
                                <a class="dropdown-item {{ $month == '2024-06' ? 'active' : '' }}" href="{{ route('rekap.index',['month' => '2024-06']) }}">Juni</a>
                                <a class="dropdown-item {{ $month == '2024-07' ? 'active' : '' }}" href="{{ route('rekap.index',['month' => '2024-07']) }}">Juli</a>
                                <a class="dropdown-item {{ $month == '2024-08' ? 'active' : '' }}" href="{{ route('rekap.index',['month' => '2024-08']) }}">Agustus</a>
                                <a class="dropdown-item {{ $month == '2024-09' ? 'active' : '' }}" href="{{ route('rekap.index',['month' => '2024-09']) }}">September</a>
                                <a class="dropdown-item {{ $month == '2024-10' ? 'active' : '' }}" href="{{ route('rekap.index',['month' => '2024-10']) }}">Oktober</a>
                                <a class="dropdown-item {{ $month == '2024-11' ? 'active' : '' }}" href="{{ route('rekap.index',['month' => '2024-11']) }}">November</a>
                                <a class="dropdown-item {{ $month == '2024-12' ? 'active' : '' }}" href="{{ route('rekap.index',['month' => '2024-12']) }}">Desember</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="chart-bulanan"></div>
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
                name: "Jumlah JP",
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
<script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function () {
        const employes = @json($employes);

        const names = employes.map(emp => emp.name.split(' ')[0]);
        const jp = employes.map(emp => emp.jp);
        window.ApexCharts && (new ApexCharts(document.getElementById('chart-bulanan'), {
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
                name: "Jumlah JP",
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