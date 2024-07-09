<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;



class RegisterController extends Controller
{
    public function register(Request $request)
    {
        // Mendapatkan data dari input form registrasi
        $email = $request->input('email');
        $password = $request->input('password');

        // Memeriksa apakah sudah ada pengguna dengan peran "admin"
        $adminCount = User::where('role', 'admin')->count();

        // Jika sudah ada pengguna dengan peran "admin", set peran pengguna yang baru sebagai "user"
        $role = ($adminCount > 0) ? 'user' : 'admin';

        // Membuat pengguna baru
        $user = new User();
        $user->name = $email;
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->role = $role;
        $user->save();

        // Lakukan proses otentikasi pengguna setelah berhasil registrasi
        auth()->login($user);

        // Redirect pengguna ke halaman home setelah otentikasi
        return redirect()->route('home');
    }


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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}