@extends('layouts.app')

@section('content')

    <div class="row mt-5">
        <div class="col-12 text-center animated fadeIn">
            <hr>
            <h3 class="font-weight-light" style="margin-top: -38px;">
                            <span class="bg-white pl-3 pr-3">
                                <strong>Sign</strong>
                                <span class="text-muted">Up</span>
                            </span>
            </h3>
        </div>
    </div>

    <div class="pl-2 mt-3 pb-5 pr-2 ml-0">

        <form id="sign-up-form" class="" action="{{ route('register') }}" method="POST">
            @csrf
            <div class="row text-center">
                <div class="form-group col-12 pl-4 pr-4">
                    <label for="name">Full Name</label>
                    <input type="text"
                           id="name"
                           class="form-control"
                           name="name"
                           value="{{ old('name') }}"
                           placeholder="Enter Full Name">
                </div>

                <div class="form-group col-12 pl-4 pr-4">
                    <label for="email">Email Address</label>
                    <input type="text"
                           id="email"
                           class="form-control"
                           name="email"
                           value="{{ old('email') }}"
                           placeholder="Enter Email Address">
                    <div class="invalid-feedback">
                        Please provide a valid Email.
                    </div>
                </div>

                <div class="form-group col-12 pl-4 pr-4">
                    <label for="password">Password</label>
                    <input type="password"
                           id="password"
                           class="form-control"
                           name="password"
                           placeholder="Enter Password">
                </div>

                <div class="form-group col-12 pl-4 pr-4">
                    <label for="confirm">Confirm Password</label>
                    <input type="password"
                           id="confirm"
                           class="form-control"
                           name="password_confirmation"
                           placeholder="Confirm Password">
                    <div class="invalid-feedback">
                        Passwords must match.
                    </div>
                </div>

                <div class="form-group col-12">
                    <button id="btn-save" class="btn btn-primary">
                        <i class="fa fa-check-circle"></i>
                        Register
                    </button>
                </div>

                <div class="form-group col-12">
                    Already a User? <a href="{{ route('login') }}">Sign In</a>
                </div>

            </div>
        </form>

    </div>
@endsection
