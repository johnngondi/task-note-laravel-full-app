@extends('layouts.app')

@section('content')

    <div class="row mt-5">
        <div class="col-12 text-center animated fadeIn">
            <hr>
            <h3 class="font-weight-light" style="margin-top: -38px;">
                            <span class="bg-white pl-3 pr-3">
                                <strong>Reset</strong>
                                <span class="text-muted">Password</span>
                            </span>
            </h3>
        </div>
    </div>

    <div class="pl-2 mt-3 pb-5 pr-2 ml-0">

        <form id="sign-in-form" class="" action="{{ route('password.email') }}" method="POST">
            @csrf

            <div class="row text-center">


                @error('email')
                <div class="col-12 text-danger">
                    {{ $message }}
                </div>
                @enderror

                <div class="form-group col-12 pl-4 pr-4 mb-3">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <label for="email">Email Address</label>
                    <input type="text"
                           id="email"
                           class="form-control"
                           name="email"
                           value="{{ old('email') }}"
                           placeholder="Enter Email Address">
                </div>

                <div class="form-group col-12 mt-3">
                    <button id="btn-save" class="btn btn-primary">
                        <i class="fa fa-check-circle"></i>
                        Send Reset Link
                    </button>
                </div>

            </div>
        </form>

    </div>
@endsection

