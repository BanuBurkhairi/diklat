<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Training;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class TrainingController extends Controller
{
    public function index()
    {
        // Ambil data pegawai dan jumlah JP mereka
        $employees = User::with('trainings')->get()->map(function($user) {
            return [
                'name' => $user->name,
                'jp' => $user->trainings->sum('duration'),
            ];
        });

        return view('trainings.index', compact('employees'));
    }

    public function create()
    {
        return view('trainings.create');
    }

    public function userTrainings()
    {
        // Tampilkan semua pelatihan milik pengguna yang terautentikasi
        $trainings = Training::where('user_id', Auth::id())->orderBy('tanggal_pelatihan', 'desc')->get();
        return view('trainings.show', compact('trainings'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'duration' => 'required|integer|min:1',
            'tanggal_pelatihan' => 'required|date',
            'certificate' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048', // Pastikan ukuran sesuai validasi
        ]);

        Log::info('Data diterima:', $validatedData);

        $training = Training::create([
            'user_id' => Auth::id(),
            'title' => $validatedData['title'],
            'duration' => $validatedData['duration'],
            'tanggal_pelatihan' => $validatedData['tanggal_pelatihan'],
        ]);

        if ($request->hasFile('certificate')) {
            try {
                $file = $request->file('certificate');
                $filename = Auth::id() . '_' . $training->id . '.' . $file->getClientOriginalExtension();
                $path = public_path('sertifikat');

                if (!file_exists($path)) {
                    mkdir($path, 0755, true);
                }

                $file->move($path, $filename);

                if (file_exists($path . '/' . $filename)) {
                    $training->certificate_url = '/sertifikat/' . $filename;
                    $training->save();
                } else {
                    throw new \Exception('Failed to move uploaded file.');
                }
            } catch (\Exception $e) {
                Log::error('File upload error', ['error' => $e->getMessage()]);
                return redirect()->back()->withErrors(['certificate' => 'Failed to upload certificate: ' . $e->getMessage()])->withInput();
            }
        }

        return redirect()->route('trainings.index')->with('success', 'Training added successfully.');
    }

    public function edit(Training $training)
    {
        return view('trainings.edit', compact('training'));
    }

    public function update(Request $request, Training $training)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'duration' => 'required|integer|min:1',
            'tanggal_pelatihan' => 'required|date',
            'certificate' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $training->update([
            'title' => $validatedData['title'],
            'duration' => $validatedData['duration'],
            'tanggal_pelatihan' => $validatedData['tanggal_pelatihan'],
        ]);

        if ($request->hasFile('certificate')) {
            try {
                $file = $request->file('certificate');
                $filename = Auth::id() . '_' . $training->id . '.' . $file->getClientOriginalExtension();
                $path = public_path('sertifikat');

                if (!file_exists($path)) {
                    mkdir($path, 0755, true);
                }

                $file->move($path, $filename);

                if (file_exists($path . '/' . $filename)) {
                    $training->certificate_url = '/sertifikat/' . $filename;
                    $training->save();
                } else {
                    throw new \Exception('Failed to move uploaded file.');
                }
            } catch (\Exception $e) {
                Log::error('File upload error', ['error' => $e->getMessage()]);
                return redirect()->back()->withErrors(['certificate' => 'Failed to upload certificate: ' . $e->getMessage()])->withInput();
            }
        }

        return redirect()->route('trainings.index')->with('success', 'Training updated successfully.');
    }

    public function destroy(Training $training)
    {
        $training->delete();
        
        return redirect()->route('trainings.user')->with('success', 'Training deleted successfully.');
        
        
    }

}
