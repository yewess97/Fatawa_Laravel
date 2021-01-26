<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Answer;
use App\Models\Specialize;
use App\Models\User;
use Auth;

use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function answers()
    {
        $user_profiles = User::where('id', Auth::id())->get();
        $specializes = Specialize::all();
        $questions = Question::all();
        $answers = Answer::all();

        return view('admin/admin-answers', compact('user_profiles','answers', 'questions', 'specializes'));
    }

    public function update_answer(Request $request, $answer_id)
    {
        $answer = Answer::find($answer_id);
        $answer->name = $request->get('answer_name');
        $answer->question_id = $request->get('question_name');
        $answer->user_id = auth()->id();
        $answer->save();
        if ($request->ajax()) {
            return response()->json(['success' => 'success', 'message' => __('all.answer_updated')]);
        }
        return redirect()->route('answers');
    }

    public function delete_answer(Request $request, $answer_id)
    {
        $answer = Answer::find($answer_id);
        $answer->delete();
        if ($request->ajax()) {
            return response()->json(['success' => 'success', 'message' => __('all.answer_deleted')]);
        }
        return back();
    }
}
