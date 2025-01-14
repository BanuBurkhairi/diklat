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
        $allowedUserIds = [340060555, 340059736, 340057574, 340017897, 340057217];
        $currentYear = date('Y');
        $selectedYear = $request->input('year', $currentYear);
        $years = Training::selectRaw('YEAR(tanggal_pelatihan) as year')  
        ->distinct()  
        ->orderBy('year', 'desc')  
        ->pluck('year');

        //Cek apakah admin atau bukan
        if (in_array(Auth::id(), $allowedUserIds)) {
            $jumlahPegawai = User::count();
            $jumlahJamPelajaran = Training::whereYear('tanggal_pelatihan', $selectedYear)->sum('duration');
            $persentaseJamPelajaran = $jumlahJamPelajaran / ($jumlahPegawai * 20) * 100;
            
            //Dashboard Total
            $employees = User::with(['trainings' => function ($query) use ($selectedYear) {  
                $query->whereYear('tanggal_pelatihan', $selectedYear);  
            }])->get()->map(function($user) {  
                return [  
                    'name' => $user->name,  
                    'jp' => $user->trainings->sum('duration'),  
                ];  
            }); 
            return view('rekap.index', compact('jumlahPegawai', 'jumlahJamPelajaran', 'persentaseJamPelajaran', 'employees', 'years', 'selectedYear'));
        } else {
            return back();
        }
        
    }
}

