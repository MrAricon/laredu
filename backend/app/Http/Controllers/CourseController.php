<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        return response()->json(Course::all(), 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $course = Course::create($request->all());

        return response()->json([
            'message' => 'Course created successfully',
            'course' => $course
        ], 201);
    }

    public function show($id)
    {
        $course = Course::find($id);

        if (!$course) {
            return response()->json(
                ['message' => 'Course not found'],
                404
            );
        }

        return response()->json($course, 200);
    }

    public function update(Request $request, $id)
    {
        $course = Course::find($id);

        if (!$course) {
            return response()->json(
                ['message' => 'Course not found'],
                404
            );
        }

        $request->validate([
            'name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $course->update($request->all());

        return response()->json([
            'message' => 'Course updated successfully',
            'course' => $course
        ], 200);
    }

    public function destroy($id)
    {
        $course = Course::find($id);

        if (!$course) {
            return response()->json(
                ['message' => 'Course not found'],
                404
            );
        }

        $course->delete();
        
        return response()->json(['message' => 'Course deleted successfully'], 200);
    }
}
