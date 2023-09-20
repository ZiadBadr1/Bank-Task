@extends('layouts.admin.main')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Details</div>

                    <div class="card-body">
                        <form method="get" action="{{ route('transfer',$user->id)}}">
                            @csrf
                                <label for="email" class="col-md-4 col-form-label text-md-start">name : {{$user->name}}</label>
                                <br>
                                <label for="email" class="col-md-4 col-form-label text-md-start">email : {{$user->email}}</label>
                                <br>
                                <label for="email" class="col-md-4 col-form-label text-md-start">amount : {{$user->current_balance}}</label>
                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-5 mt-3">
                                <button type="submit" class="btn btn-primary ">
                                transfer
                            </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
