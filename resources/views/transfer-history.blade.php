@extends('layouts.admin.main')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            @if(Session::has('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
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
                            <th>From</th>
                            <th>To</th>
                            <th>Amount</th>
                            <th>Date</th>

                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>From</th>
                            <th>To</th>
                            <th>Amount</th>
                            <th>Date</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach(\App\Models\Transfer::all() as $transfer)
                            <tr>
                                <td>{{$transfer->sender}}</td>
                                <td>{{$transfer->receiver}}</td>
                                <td>{{$transfer->amount}}</td>
                                <td>{{$transfer->created_at}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
