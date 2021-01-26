<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Specialize;
use Auth;

use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Compound;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function sheikhs()
    {
        $user_profiles = User::where('id', Auth::id())->get();
        $sheikhs = User::where('role', 1)->get();
        $specializes = Specialize::all();
        return view('admin/admin-user_admin', compact('user_profiles','sheikhs', 'specializes'));
    }

    public function add_sheikh(Request $request)
    {
        $sheikh = new User();
        $sheikh->name_ar = $request->get('name_ar');
        $sheikh->name_en = $request->get('name_en');
        $sheikh->gender = $request->get('gender');
        $sheikh->birth_date = $request->get('birth_date');
        $sheikh->social_status = $request->get('social_status');
        $sheikh->email = $request->get('email');
        $sheikh->password = Hash::make($request->get('password'));
        $sheikh->phone = $request->get('mobile_number');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image_name = time() . $file->getClientOriginalName();
            $image_path = 'images/users_images/';
            $file->move($image_path, $image_name);
            $image = $image_path . $image_name;
            $sheikh->users_image = $image;
        }
        else {
            $sheikh->users_image = 'images/default-user.jpg';
        }
        $sheikh->role = 1;
        $sheikh->specialize_id = $request->get('sheikh_specialize');
        $sheikh->save();
        return back();
    }

    public function update_sheikh(Request $request, $sheikh_id)
    {
        $sheikh = User::find($sheikh_id);
        $sheikh->name_ar = $request->get('name_ar');
        $sheikh->name_en = $request->get('name_en');
        $sheikh->gender = $request->get('gender');
        $sheikh->birth_date = $request->get('birth_date');
        $sheikh->social_status = $request->get('social_status');
        $sheikh->email = $request->get('email');
        $sheikh->password = Hash::make($request->get('password'));
        $sheikh->phone = $request->get('mobile_number');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image_name = time() . $file->getClientOriginalName();
            $image_path = 'images/users_images/';
            $file->move($image_path, $image_name);
            $image = $image_path . $image_name;
            $sheikh->users_image = $image;
        }
        $sheikh->role = 1;
        $sheikh->specialize_id = $request->get('sheikh_specialize');
        $sheikh->save();
        if ($request->ajax()) {
            return response()->json(['success' => 'success', 'message' => __('all.sheikh_updated')]);
        }
        return redirect()->route('sheikhs');
    }

    public function delete_sheikh(Request $request, $sheikh_id)
    {
        $sheikh = User::find($sheikh_id);
        $sheikh->delete();
        if ($request->ajax()) {
            return response()->json(['success' => 'success', 'message' => __('all.sheikh_deleted')]);
        }
        return back();
    }

    public function users()
    {
        $user_profiles = User::where('id', Auth::id())->get();
        $users = User::where('role', 0)->orWhere('role', 2)->get();
        $specializes = Specialize::all();
        return view('admin/admin-users', compact('user_profiles','users', 'specializes'));
    }

    public function add_user(Request $request)
    {
        $user = new User();
        $user->name_ar = $request->get('name_ar');
        $user->name_en = $request->get('name_en');
        $user->gender = $request->get('gender');
        $user->birth_date = $request->get('birth_date');
        $user->social_status = $request->get('social_status');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->phone = $request->get('mobile_number');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image_name = time() . $file->getClientOriginalName();
            $image_path = 'images/users_images/';
            $file->move($image_path, $image_name);
            $image = $image_path . $image_name;
            $user->users_image = $image;
        } else {
            $user->users_image = 'images/default-user.jpg';
        }
        $user->role = $request->get('role');
        $user->save();
        return back();
    }

    public function update_user(Request $request, $user_id)
    {
        $user = User::find($user_id);
        $user->name_ar = $request->get('name_ar');
        $user->name_en = $request->get('name_en');
        $user->gender = $request->get('gender');
        $user->birth_date = $request->get('birth_date');
        $user->social_status = $request->get('social_status');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->phone = $request->get('mobile_number');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image_name = time() . $file->getClientOriginalName();
            $image_path = 'images/users_images/';
            $file->move($image_path, $image_name);
            $image = $image_path . $image_name;
            $user->users_image = $image;
        }
        $user->role = $request->get('role');
        $user->save();
        if ($request->ajax()) {
            return response()->json(['success' => 'success', 'message' => __('all.user_updated')]);
        }
        return redirect()->route('users');
    }

    public function delete_user(Request $request, $user_id)
    {
        $user = User::find($user_id);
        $user->delete();
        if ($request->ajax()) {
            return response()->json(['success' => 'success', 'message' => __('all.user_deleted')]);
        }
        return back();
    }
}
