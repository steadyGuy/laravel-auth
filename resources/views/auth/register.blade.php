@extends('layouts/app-layout')
@section('title', 'Регистрация')
@section('content')
    <form action={{route('auth.create')}} method="post">
        {{-- !! --}}
        @csrf

        <div class="results">
            @if(Session::get('success'))
                <x-alert infoText="success">
                    {{ Session::get('success') }}
                </x-alert>
            @endif

            @if(Session::get('fail'))
            <x-alert infoText="danger">
                {{ Session::get('fail') }}
            </x-alert>
        @endif
        </div>

        <div class="container">
        <h4 class="text-center">Регистрация пользователя</h4>
        <hr />
        <label for="uname"><b>Имя пользователя</b></label>
        <input type="text" placeholder="Введите имя пользователя" name="name" value={{ old('name') }}>
        <p class="text-danger">@error('name')
            {{ $message }}
        @enderror</p>
        <label for="uemail"><b>Email пользователя</b></label>
        <input type="text" placeholder="Введите Email пользователя" name="email" value={{ old('email') }}>
        <p class="text-danger">@error('email')
            {{ $message }}
        @enderror</p>
        <label for="psw"><b>Пароль</b></label>
        <input type="password" placeholder="Введите пароль" name="password" value={{ old('password') }}>
        <p class="text-danger">@error('password')
            {{ $message }}
        @enderror</p>
        <button type="submit">Войти</button>
        </div>

        <div class="container">
            <div class="row">
                <span class="psw">Уже есть аккаунт? <a href="/login">войдите прямо сейчас!</a></span>
            </div>
        </div>
    </form>
@endsection
