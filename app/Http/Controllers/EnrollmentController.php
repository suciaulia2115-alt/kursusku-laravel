<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EnrollmentController extends Controller
{
    /**
     * Menampilkan formulir pendaftaran.
     */
    public function create()
    {
        $participants = Participant::orderBy('name')->get();

        $courses = Course::where('status', 'open')
            ->orderBy('name')
            ->get();

        return view('enrollments.create', compact(
            'participants',
            'courses'
        ));
    }

    /**
     * Menyimpan pendaftaran peserta.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'participant_id' => [
                'required',
                'exists:participants,id',
            ],

            'course_id' => [
                'required',
                'exists:courses,id',
                Rule::unique('enrollments', 'course_id')
                    ->where(function ($query) use ($request) {
                        return $query->where(
                            'participant_id',
                            $request->participant_id
                        );
                    }),
            ],
        ], [
            'participant_id.required' =>
                'Peserta wajib dipilih.',

            'participant_id.exists' =>
                'Peserta tidak ditemukan.',

            'course_id.required' =>
                'Kursus wajib dipilih.',

            'course_id.exists' =>
                'Kursus tidak ditemukan.',

            'course_id.unique' =>
                'Participant ini sudah terdaftar pada course tersebut.',
        ]);

        Enrollment::create([
            'participant_id' => $validated['participant_id'],
            'course_id' => $validated['course_id'],
            'status' => 'registered',
        ]);

        return redirect()
            ->route('enrollments.index')
            ->with('success', 'Pendaftaran berhasil disimpan.');
    }

    /**
     * Menampilkan laporan pendaftaran.
     */
    public function index()
    {
        $enrollments = Enrollment::with([
            'participant',
            'course',
        ])->latest()->get();

        return view('enrollments.index', compact('enrollments'));
    }
}
