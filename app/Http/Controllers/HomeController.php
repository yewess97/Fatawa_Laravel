<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Specialize;
use App\Models\Question;
use App\Models\Favourite;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function profile()
    {
        $user_profiles = User::where('id', Auth::id())->get();
        $specializes = Specialize::all();
        $questions = Question::where('user_id', Auth::id())->whereHas('answer')->get();
        $favourites = Favourite::where('user_id', Auth::id())->get();

        return view('profile/user-profile', compact('user_profiles','specializes', 'questions', 'favourites'));
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'password' => ['required', 'string', 'min:8', 'max:12'],
        ]);
    }

    public function update_profile(Request $request, $user_id)
    {
        $this->validator($request->all())->validate();

        $user_profile = User::find($user_id);
        $user_profile->name_ar = $request->get('name_ar');
        $user_profile->name_en = $request->get('name_en');
        $user_profile->gender = $request->get('gender');
        $user_profile->birth_date = $request->get('birth_date');
        $user_profile->social_status = $request->get('social_status');
        $user_profile->email = $request->get('email');
        $user_profile->password = Hash::make($request->get('password'));
        $user_profile->phone = $request->get('mobile_number');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image_name = time() . $file->getClientOriginalName();
            $image_path = 'images/users_images/';
            $file->move($image_path, $image_name);
            $image = $image_path . $image_name;
            $user_profile->users_image = $image;
        }
        if ($user_profile->role == 1) {
            $user_profile->specialize_id = $request->get('sheikh_specialize');
        }
        $user_profile->save();
        if ($request->ajax()) {
            return response()->json(['success' => 'success', 'message' => __('all.profile_updated')]);
        }
        return redirect()->route('profile');
    }

    public function delete_profile(Request $request, $user_id)
    {
        $user_profile = User::find($user_id);
        $user_profile->delete();
        return redirect()->route('index');
    }

    public function send_question()
    {
        $user_profiles = User::where('id', Auth::id())->get();
        $specializes = Specialize::all();
        $questions = Question::where('user_id', Auth::id())->whereHas('answer')->get();
        $favourites = Favourite::where('user_id', Auth::id())->get();

        return view('profile/profile-send-question', compact('user_profiles', 'specializes', 'questions', 'favourites'));
    }

    public function my_questions()
    {
        $user_profiles = User::where('id', Auth::id())->get();
        $specializes = Specialize::all();
        $questions = Question::where('user_id', Auth::id())->whereHas('answer')->get();
        $favourites = Favourite::where('user_id', Auth::id())->get();

        return view('profile/profile-my-questions', compact('user_profiles','specializes', 'questions','favourites'));
    }
}
