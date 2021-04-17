@extends('layouts/app-layout')
@section('title', 'Page Title')
@section('content')
    <div class="container">
        <div class="row" style="margin-top: 45px;">
            <div class="col-md-6 offset-md-3">
                <h4>Профиль</h4>
                <hr />
                <table class="table table-hover">
                    <thead>
                        <th>Name</th>
                        <th>Email</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $LoggedUserInfo->name }}</td>
                            <td>{{ $LoggedUserInfo->email }}</td>
                            <td><a href="logout">Logout</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
