@extends('layouts.admin.main')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            @if(Session::has('success'))
                <div class="alert alert-success" style="width: 1100px;">{{Session::get('success')}}</div>
            @endif
            @if(Session::has('error'))
                <div class="alert alert-danger" style="width: 1100px;">{{Session::get('error')}}</div>
            @endif
            <div class="card mb-4" style="width: 85%">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    All Users
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Current balance</th>
                            <th>Show</th>

                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Current balance</th>
                            <th>Show</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->current_balance}}</td>
                                <td>
                                    <a href="{{route('user.show',$user->id)}}">
                                        <button class="btn btn-info">Show</button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
