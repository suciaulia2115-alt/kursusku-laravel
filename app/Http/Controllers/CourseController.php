<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // Menampilkan semua kursus
    public function index()
    {
        $courses = Course::latest()->get();

        return view('courses.index', compact('courses'));
    }

    // Menampilkan formulir tambah kursus
    public function create()
    {
        return view('courses.create');
    }

    // Menyimpan kursus baru
    public function store(Request $request)
    {
        $data = $request->validate([
            'code' => ['required', 'max:20', 'unique:courses,code'],
            'name' => ['required', 'max:120'],
            'description' => ['nullable', 'string'],
            'fee' => ['required', 'integer', 'min:0'],
            'quota' => ['required', 'integer', 'min:1', 'max:500'],
            'start_date' => ['required', 'date'],
            'status' => ['required', 'in:draft,open,closed'],
        ]);

        Course::create($data);

        return to_route('courses.index')
            ->with('success', 'Kursus berhasil ditambahkan.');
    }

    // Menampilkan formulir edit kursus
    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    // Memperbarui data kursus
    public function update(Request $request, Course $course)
    {
        $data = $request->validate([
            'code' => [
                'required',
                'max:20',
                'unique:courses,code,' . $course->id,
            ],
            'name' => ['required', 'max:120'],
            'description' => ['nullable', 'string'],
            'fee' => ['required', 'integer', 'min:0'],
            'quota' => ['required', 'integer', 'min:1', 'max:500'],
            'start_date' => ['required', 'date'],
            'status' => ['required', 'in:draft,open,closed'],
        ]);

        $course->update($data);

        return to_route('courses.index')
            ->with('success', 'Kursus berhasil diperbarui.');
    }

    // Menghapus kursus
    public function destroy(Course $course)
    {
        $course->delete();

        return to_route('courses.index')
            ->with('success', 'Kursus berhasil dihapus.');
    }
}
