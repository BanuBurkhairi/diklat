<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RekapController extends Controller
{
    public function index(Request $request)
    {
        $allowedUserIds = [340060555, 340057574, 340017897, 340057217];
        
        //Cek apakah admin atau bukan
        if (in_array(Auth::id(), $allowedUserIds)) {
            $jumlahPegawai = User::count();
            $jumlahJamPelajaran = Training::sum('duration'); // Asumsi ada kolom `jam_pelajaran` di tabel `trainings`
            $persentaseJamPelajaran = $jumlahJamPelajaran / ($jumlahPegawai * 20) * 100;
            
            //Dashboard Total
            $employees = User::with('trainings')->get()->map(function($user) {
                return [
                    'name' => $user->name,
                    'jp' => $user->trainings->sum('duration'),
                ];
            });

            //Dashboard Bulanan
            
            $month = $request->month;
            $startOfMonth = Carbon::parse($month . '-01')->startOfMonth()->format('Y-m-d');
            $endOfMonth = Carbon::parse($month . '-01')->endOfMonth()->format('Y-m-d');

            // Ambil data pelatihan sesuai bulan ini
            $employes = User::with(['trainings' => function ($query) use ($startOfMonth, $endOfMonth) {
                $query->whereBetween('tanggal_pelatihan', [$startOfMonth, $endOfMonth]);
            }])->get()->map(function($user) use ($startOfMonth, $endOfMonth) {
                $monthlyDuration = $user->trainings
                    ->whereBetween('tanggal_pelatihan', [$startOfMonth, $endOfMonth])
                    ->sum('duration');

                return [
                    'name' => $user->name,
                    'jp' => $monthlyDuration,
                ];
            });

            return view('rekap.index', compact('jumlahPegawai', 'jumlahJamPelajaran', 'persentaseJamPelajaran', 'employees', 'employes', 'month'));
        } else {
            return back();
        }
        
    }
}

