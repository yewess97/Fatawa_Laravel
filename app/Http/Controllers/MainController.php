<?php

namespace App\Http\Controllers;

use App;
use Auth;
use Cache;
use App\Models\Specialize;
use App\Models\Question;
use App\Models\Answer;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function admin()
    {
        $user_profiles = User::where('id', Auth::id())->get();
        $specializes = Specialize::count();
        $questions = Question::count();
        $answers = Answer::count();
        $sheikhs = User::where('role', 1)->count();
        $users = User::where('role', 0)->count();
        return view('admin/admin', compact('user_profiles', 'specializes', 'questions', 'answers', 'sheikhs', 'users'));
    }

    public function language($lang)
    {
        App::setlocale($lang);
        session()->put('locale', $lang);
        return redirect()->back();
    }

    public function search(Request $request)
    {
        $user_profiles = User::where('id', Auth::id())->get();
        $specializes = Specialize::all();
        if (!empty($request->get('search'))) {
            $search = $request->get('search');
            Cache::put('search_name', $request->get('search'));
        } else {
            $search = Cache::get('search_name');
        }
        $questions = Question::where('name', 'like', '%' .$search. '%')->orWhereHas('answer', function($q) use($search) {
            $q->where('name','like','%'.$search.'%');
        })->get();

        return view('search', compact('questions', 'user_profiles', 'specializes'));
    }
}
