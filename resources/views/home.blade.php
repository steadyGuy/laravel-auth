@extends('layouts/app-layout')
@section('title', 'Список пользователей')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <p>
                @foreach ($users as $user)
                    @if ($user->id == 1)
                    <ul>
                        <li class="list-group-item active">Тут должен быть юзер с айди 1</li>
                    </ul>
                        @continue
                    @endif
                    <br />
                    <ul>
                        <li class="list-group-item">{{ $user->id }}</li>
                        <li class="list-group-item">{{ $user->email }}</li>
                        <li class="list-group-item">{{ $user->name }}</li>
                    </ul>
                @endforeach
            </p>
        </div>
    </div>
</div>
@endsection

