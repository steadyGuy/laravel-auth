@extends('layouts/app-layout')
@section('title', 'Логин')
@section('content')
    <form action={{route('auth.check')}} method="post">
        {{-- не забути розказати за це --}}
        @csrf

        @if(Session::get('fail'))
        <x-alert infoText="danger">
            {{ Session::get('fail') }}
        </x-alert>
        @endif

        <div class="container">
        <h4 class="text-center">Аутентификация пользователя</h4>
        <hr />
        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Введите Email пользователя" name="email" value={{ old('email') }}>
        <p class="text-danger">@error('email')
            {{ $message }}
        @enderror</p>
        <label for="password"><b>Пароль</b></label>
        <input type="password" placeholder="Введите пароль" name="password" value={{ old('password') }}>
        <p class="text-danger">@error('password')
            {{ $message }}
        @enderror</p>
        <button type="submit">Войти</button>
        </div>

        <div class="container">
            <div class="row">
                <span class="psw">Ёще нет аккаунта? <a href="/register">создайте прямо сейчас!</a></span>
            </div>
        </div>
    </form>
@endsection
