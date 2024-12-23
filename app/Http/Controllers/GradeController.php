<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;
class GradeController extends Controller
{
    public function store(Request $request) {
        
        $validated = $request->validate([
            'user_id' => 'required',
            'subject_id' => 'required',
            'period_id' => 'required',
            'enrollment_id' => 'required',
            'faculty_name' => 'required',
            'grade' => 'required',
            'status' => 'required',
        ]);

        try {

            $grade = Grade::create([
                'user_id' => $validated['user_id'],
                'subject_id' => $validated['subject_id'],
                'period_id' => $validated['period_id'],
                'enrollment_id' => $validated['enrollment_id'],
                'faculty_name' => $validated['faculty_name'],
                'grade' => $validated['grade'],
                'status' => $validated['status'],
            ]);

            return response()->json([
                'messages' => 'Successfully insert grade',
                'grade' => $grade,
            ]);

        }catch (e) {
            return response()->json([
                'messages' => 'Something went error',
                'error' => $e->getMessage(),
            ]);
        }
    }
    

    public function prelim($id, $subject, $enrollment) {
        // Fetch the prelim grade based on user_id, subject_id, and enrollment
        $prelimGrade = Grade::where('user_id', $id)
                            ->where('subject_id', $subject)
                            ->where('enrollment', $enrollment)
                            ->first();
    
        if (!$prelimGrade) {
            return response()->json(['message' => 'No Grades found'],404);
        }

        return response()->json($prelimGrade, 200);
    }

    public function midterm($id, $subject, $enrollment) {
        // Fetch the prelim grade based on user_id, subject_id, and enrollment
        $midtermGrade = Grade::where('user_id', $id)
                            ->where('subject_id', $subject)
                            ->where('enrollment', $enrollment)
                            ->first();
    
        if (!$midtermGrade) {
            return response()->json(['message' => 'No Grades found'],404);
        }

        return response()->json($midtermGrade, 200);
    }

    public function semifinal($id, $subject, $enrollment) {
        // Fetch the prelim grade based on user_id, subject_id, and enrollment
        $semifinalGrade = Grade::where('user_id', $id)
                            ->where('subject_id', $subject)
                            ->where('enrollment', $enrollment)
                            ->first();
    
        if (!$semifinalGrade) {
            return response()->json(['message' => 'No Grades found'],404);
        }

        return response()->json($semifinalGrade, 200);
    }

    public function final($id, $subject, $enrollment) {
        // Fetch the prelim grade based on user_id, subject_id, and enrollment
        $finalGrade = Grade::where('user_id', $id)
                            ->where('subject_id', $subject)
                            ->where('enrollment', $enrollment)
                            ->first();
    
        if (!$finalGrade) {
            return response()->json(['message' => 'No Grades found'],404);
        }

        return response()->json($finalGrade, 200);
    }
}
