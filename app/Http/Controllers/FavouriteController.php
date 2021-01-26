<?php

namespace App\Http\Controllers;

use App\Models\Favourite;
use App\Models\Question;
use App\Models\User;
use App\Models\Specialize;
use Auth;
use Illuminate\Http\Request;

class FavouriteController extends Controller
{
    public function favourites()
    {
        $user_profiles = User::where('id', Auth::id())->get();
        $specializes = Specialize::all();
        $questions = Question::where('user_id', Auth::id())->whereHas('answer')->get();
        $favourites = Favourite::where('user_id', Auth::id())->whereHas('question')->get();

        return view('profile/profile-favourites', compact('user_profiles', 'favourites', 'questions', 'specializes'));
    }

    public function add_favourite(Request $request, $question_id)
    {
        $favouriteExists = Favourite::where('user_id', Auth::id())->where('question_id', $question_id)->first();

        if (!empty($favouriteExists)) {
            $favouriteExists->question_id = $question_id;
            $favouriteExists->save();
            if ($request->ajax()) {
                return response()->json(['success' => 'warning', 'message' => __('all.favourite_already_added')]);
            }
        } else {
            $favourite = new Favourite();
            $question = Question::find($question_id);
            $favourite->question_id = $request->get('id', $question->id);
            $favourite->user_id = auth()->id();
            $favourite->save();
            if ($request->ajax()) {
                return response()->json(['success' => 'success', 'message' => __('all.favourite_added')]);
            }
            return back();
        }
    }

    public function delete_favourite(Request $request, $favourite_id)
    {
        $favourite = Favourite::find($favourite_id);
        $favourite->delete();
        if ($request->ajax()) {
            return response()->json(['success' => 'success', 'message' => __('all.favourite_deleted')]);
        }
        return back();
    }
}
