<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LessonController extends Controller
{

    public function index(Request $request)
    {
        $lessons = Lesson::query();
        $chapterId = $request->query('chapter_id');
        $lessons->when($chapterId, function ($query) use ($chapterId) {
            return $query->where('chapter_id', '=', $chapterId);
        });

        return response()->json([
            'status' => 'success',
            'data' => $lessons->paginate(10)
        ]);
    }

    public function show($id)
    {
        $lesson = Lesson::find($id);
        if (!$lesson) {
            return response()->json([
                'status' => 'erorr',
                'message' => 'Lesson not found'
            ], 404);
        }

        return response()->json(['status' => 'success', 'data' => $lesson]);
    }

    public function create(Request $request)
    {
        $rules = [
            'name' => 'required|string',
            'video' => 'required|string',
            'chapter_id' => 'required|integer',
        ];

        $data = $request->all();

        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'erorr',
                'message' => $validator->errors()
            ]);
        }

        $chapterId = $request->input('chapter_id');
        $chapter = Chapter::find($chapterId);
        if (!$chapter) {
            return response()->json([
                'status' => 'erorr',
                'message' => 'Chapter not found'
            ], 404);
        }

        $lesson = Lesson::create($data);
        return response()->json([
            'status' => 'success',
            'data' => $lesson
        ]);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'string',
            'video' => 'string',
            'chapter_id' => 'integer',
        ];

        $data = $request->all();

        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'erorr',
                'message' => $validator->errors()
            ]);
        }

        $lesson = Lesson::find($id);
        if (!$lesson) {
            return response()->json([
                'status' => 'erorr',
                'message' => 'Lesson not found'
            ], 404);
        }

        $chapterId = $request->input('chapter_id');
        if ($chapterId) {
            $chapter = Chapter::find($chapterId);
            if (!$chapter) {
                return response()->json([
                    'status' => 'erorr',
                    'message' => 'Chapter not found'
                ], 404);
            }
        }

        $lesson->fill($data);
        $lesson->save();

        return response()->json(['status' => 'success', 'data' => $lesson]);
    }

    public function destroy($id)
    {
        $lesson = Lesson::find($id);
        if (!$lesson) {
            return response()->json([
                'status' => 'erorr',
                'message' => 'Lesson not found'
            ], 404);
        }

        $lesson->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Lesson deleted'
        ], 200);
    }
}
