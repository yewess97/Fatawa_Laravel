<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return redirect()->route('index');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name_ar' => ['required', 'string', 'max:255', 'regex:/^[\p{Arabic} ]+$/u'],
            'name_en' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z ]+$/u'],
            'birth_date' => ['required'],
            'gender' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'max:12', 'confirmed'],
            'social_status' => ['required'],
            'mobile_number' => ['required', 'string', 'min:10', 'regex:/^\+?\d{10,}$/'],
            'agreement' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        if (!empty($data['image']))
        {
            $file = $data['image'];
            $image_name = time() . $file->getClientOriginalName();
            $image_path = 'images/users_images/';
            $file->move($image_path, $image_name);
            $image = $image_path . $image_name;

            return User::create([
                'name_ar' => $data['name_ar'],
                'name_en' => $data['name_en'],
                'gender' => $data['gender'],
                'birth_date' => $data['birth_date'],
                'social_status' => $data['social_status'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'phone' => $data['mobile_number'],
                'users_image'=>$image,
                'role' => 0,
            ]);
        }
        else
        {
            return User::create([
                'name_ar' => $data['name_ar'],
                'name_en' => $data['name_en'],
                'gender' => $data['gender'],
                'birth_date' => $data['birth_date'],
                'social_status' => $data['social_status'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'phone' => $data['mobile_number'],
                'users_image'=>'images/default-user.jpg',
                'role' => 0,
            ]);
        }

    }
}
