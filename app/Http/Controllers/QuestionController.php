<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Answer;
use App\Models\Specialize;
use App\Models\User;
use Auth;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function questions()
    {
        $user_profiles = User::where('id', Auth::id())->get();
        $specializes = Specialize::all();
        $questions = Question::all();
        $answers = Answer::all();

        return view('admin/admin-questions', compact('user_profiles', 'questions', 'specializes', 'answers'));
    }

    public function add_question(Request $request)
    {
        $question = new Question();
        $question->name = $request->get('question_name');
        $question->question_text = $request->get('question_text');
        $question->specialize_id = $request->get('question_specialize');
        $question->user_id = auth()->id();
        $question->save();
        if ($request->ajax()) {
            return response()->json(['success' => 'success', 'message' => __('all.question_added')]);
        }
        return redirect()->route('questions');
    }

    public function update_question(Request $request, $question_id)
    {
        $question = Question::find($question_id);
        $question->name = $request->get('question_name');
        $question->question_text = $request->get('question_text');
        $question->specialize_id = $request->get('question_specialize');
        $question->user_id = auth()->id();
        $question->save();
        if ($request->ajax()) {
            return response()->json(['success' => 'success', 'message' => __('all.question_updated')]);
        }
        return redirect()->route('questions');
    }

    public function delete_question(Request $request, $question_id)
    {
        $question = Question::find($question_id);
        $question->delete();
        if ($request->ajax()) {
            return response()->json(['success' => 'success', 'message' => __('all.question_deleted')]);
        }
        return back();
    }

    public function add_answer(Request $request, $question_id)
    {
        $answer = new Answer();
        $question = Question::find($question_id);
        $answer->name = $request->get('answer_name');
        $answer->question_id = $request->get('id', $question->id);
        $answer->user_id = auth()->id();
        $answer->save();
        return redirect()->route('answers');
    }
}
