<?php

namespace App\Http\Controllers;

use App\Models\Specialize;
use App\Models\Question;
use App\Models\Answer;
use App\Models\User;
use Auth;

use Illuminate\Http\Request;

class SpecializeController extends Controller
{
    public function specializes()
    {
        $user_profiles = User::where('id', Auth::id())->get();
        $specializes = Specialize::all();
        return view('admin/admin-specializes', compact('user_profiles', 'specializes'));
    }

    public function add_specialize(Request $request)
    {
        $specialize = new Specialize();
        $specialize->name_ar = $request->get('name_ar');
        $specialize->name_en = $request->get('name_en');
        $specialize->description_ar = $request->get('description_ar');
        $specialize->description_en = $request->get('description_en');
        if ($request->hasFile('card_image')) {
            $file = $request->file('card_image');
            $image_name = time() . $file->getClientOriginalName();
            $image_path = 'images/specializes_images/';
            $file->move($image_path, $image_name);
            $image = $image_path . $image_name;
            $specialize->card_image = $image;
        }
        $specialize->alt_image = $request->get('alt_image');
        $specialize->books_name_ar = $request->get('books_name_ar');
        $specialize->books_name_en = $request->get('books_name_en');
        $specialize->books_link = $request->get('books_link');
        $specialize->save();
        return back();
    }

    public function update_specialize(Request $request, $specialize_id)
    {
        $specialize = Specialize::find($specialize_id);
        $specialize->name_ar = $request->get('name_ar');
        $specialize->name_en = $request->get('name_en');
        $specialize->description_ar = $request->get('description_ar');
        $specialize->description_en = $request->get('description_en');
        if ($request->hasFile('card_image')) {
            $file = $request->file('card_image');
            $image_name = time() . $file->getClientOriginalName();
            $image_path = 'images/specializes_images/';
            $file->move($image_path, $image_name);
            $image = $image_path . $image_name;
            $specialize->card_image = $image;
        }
        $specialize->alt_image = $request->get('alt_image');
        $specialize->books_name_ar = $request->get('books_name_ar');
        $specialize->books_name_en = $request->get('books_name_en');
        $specialize->books_link = $request->get('books_link');
        $specialize->save();
        if ($request->ajax()) {
            return response()->json(['success' => 'success', 'message' => __('all.specialize_updated')]);
        }
        return redirect()->route('specializes');
    }

    public function delete_specialize(Request $request, $specialize_id)
    {
        $specialize = Specialize::find($specialize_id);
        $specialize->delete();
        if ($request->ajax()) {
            return response()->json(['success' => 'success', 'message' => __('all.specialize_deleted')]);
        }
        return back();
    }

    public function specialize_questions($specialize_id)
    {
        $user_profiles = User::where('id', Auth::id())->get();
        $specializes = Specialize::all();
        $specialize = Specialize::find($specialize_id);
        $questions = Question::where('specialize_id', $specialize->id)->whereHas('answer')->get();

        //$related_questions = Specialize::where('$specialize_id', $question->specialize_id)->//where('brand_id', $product->brand_id)->//paginate(5); //I left this in comment as I will use it later in other projects IN SHAA ALLAH

        return view('specialize-questions', compact('user_profiles', 'specializes', 'specialize', 'questions'));
    }

    public function question_answer($question_id)
    {
        $user_profiles = User::where('id', Auth::id())->get();
        $specializes = Specialize::all();
        $questions = Question::find($question_id);
        $specialize = Specialize::where('id', $questions->specialize_id)->get();
        $answers = Answer::where('question_id', $questions->id);

        return view('question-answer-section', compact('user_profiles', 'specializes', 'questions', 'specialize', 'answers'));
    }
}
