<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//для хеширования паролей
use Illuminate\Support\Facades\Hash;
//модель пользователя
use App\Models\User;

class UserAuthController extends Controller
{
    function login() {
       return view('auth.login');
    }

    function register() {
        return view('auth.register');
    }

    function create(Request $request) {

        //Валидируем request
        // https://laravel.com/docs/8.x/validation

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6:max:12'
        ]);

        //Прошли валидацию? Следующий шаг...
        //queryBuilder can also be applied
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $query = $user->save();

        if($query) {
            // https://laravel.com/docs/8.x/redirects
            return back()->with('success', 'Вы успешно зарегистрировались!');
            // redirect('login');
        } else {
            return back()->with('fail', 'ЧТо-то пошло не так :('); //withInput
        }

    }

    function check(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6:max:12'
        ]);

        $user = User::where('email','=', $request->email)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('LoggedUser', $user->id);
                return redirect('profile');
            } else {
                return back()->with('fail', 'Пароли не совпадают :(');
            }
        } else {
            return back()->with('fail', 'Такого пользователя не существует :('); //withInput
        }

        return $request->input();
    }

    function logout() {
        if(session()->has('LoggedUser')) {
            session()->pull('LoggedUser');
            return redirect('/');
        }
    }
}
