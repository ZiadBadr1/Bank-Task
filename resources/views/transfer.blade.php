@extends('layouts.admin.main')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Transfer</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('transfer.amount',$user->id)}}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Amount</label>

                                <div class="col-md-6">
                                    <input id="amount" type="number" min="0"
                                           class="form-control @error('email') is-invalid @enderror" name="amount"
                                           value="{{ old('amount') }}" required autocomplete="amount" autofocus>
                                    @error('amount')
                                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                                    @enderror
                                </div>
                            </div>
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
