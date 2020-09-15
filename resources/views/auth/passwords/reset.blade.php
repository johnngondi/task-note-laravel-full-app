@extends('layouts.app')

@section('content')

    <div class="row mt-5">
        <div class="col-12 text-center animated fadeIn">
            <hr>
            <h3 class="font-weight-light" style="margin-top: -38px;">
                            <span class="bg-white pl-3 pr-3">
                                <strong>Sign</strong>
                                <span class="text-muted">In</span>
                            </span>
            </h3>
        </div>
    </div>

    <div class="pl-2 mt-3 pb-3 pr-2 ml-0">

        <form id="sign-in-form" class="" action="{{ route('password.update') }}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="row text-center">

                @error('email')
                <div class="col-12 text-danger">
                    {{ $message }}
                </div>
                @enderror

                <div class="form-group col-12 pl-4 pr-4">
                    <label for="email">Email Address</label>
                    <input type="text"
                           id="email"
                           class="form-control"
                           name="email"
                           value="{{ $email ?? old('email') }}"
                           placeholder="Enter Email Address">
                </div>

                <div class="form-group col-12 pl-4 pr-4">
                    <label for="password">New Password</label>
                    <input type="password"
                           id="password"
                           class="form-control"
                           name="password"
                           placeholder="Enter New Password">
                </div>

                <div class="form-group col-12 pl-4 pr-4">
                    <label for="password">Confirm Password</label>
                    <input type="password"
                           id="password"
                           class="form-control"
                           name="password_confirmation"
                           placeholder="Confirm Password">
                </div>


                <div class="form-group col-12">
                    <button id="btn-save" class="btn btn-primary">
                        <i class="fa fa-check-circle"></i>
                        Change Password
                    </button>
                </div>


            </div>
        </form>

    </div>
@endsection


