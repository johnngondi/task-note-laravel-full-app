@extends('layouts.app')

@section('actions')
    <h6 class="ml-0  text-secondary text-center">Task & Note Manager App</h6>
    <p class="text-muted text-center">Version 0.1.0</p>
@endsection

@section('content')

    <div class="row ">
        <div class="col-12 text-center animated fadeIn">
            <hr>
        </div>
    </div>

    <div class="row mt-2 pb-2">
        <div class="col-12 text-center">

            <div onclick="goTo('/')"
                 class="row pb-3 pt-3 pl-2 pr-2 ml-3 mr-3 mb-3 animated fadeInUp align-content-center text-secondary tapable hoverable rounded-pill border">

                <div class="col-10 text-left">
                    <i class="fa fa-home"></i> Back Home
                </div>
                <div class="col-2">
                    <i class="fa fa-angle-right"></i>
                </div>
            </div>

            <div onclick="$('#logout-form').submit()"
                 class="row pb-3 pt-3 pl-2 pr-2 ml-3 mr-3 mb-3 animated fadeInUp align-content-center text-secondary tapable hoverable rounded-pill border">
                <form id="logout-form"
                      method="POST"
                      action="logout">
                       @csrf
                </form>
                <div class="col-10 text-left">
                    <i class="fa fa-sign-out-alt"></i> Logout
                </div>
                <div class="col-2">
                    <i class="fa fa-angle-right"></i>
                </div>
            </div>

            <div onclick="deleteAccount()"
                 class="row pb-3 pt-3 pl-2 pr-2 ml-3 mr-3 mb-4 animated fadeInUp align-content-center text-danger tapable hoverable rounded-pill border">
                <form id="delete-account-form"
                      method="POST"
                      action="user/{{ auth()->user()->id }}">
                      @csrf
                      @method('DELETE')
                </form>
                <div class="col-10 text-left">
                    <i class="fa fa-exclamation-circle"></i> Delete My Account
                </div>
                <div class="col-2">
                    <i class="fa fa-angle-right"></i>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <h6 class="text-secondary">Credits</h6>
                    <p class="text-muted ml-3 mr-3">
                        <small>
                            <strong>Developer</strong>: <a target="_blank" href="https://github.com/johnngondi">John Ngondi</a>
                        </small>

                        <br>

                        <small>
                            <strong>Logo</strong>: <a target="_blank" href="https://freepik.com">Freepik</a>
                        </small>

                    </p>
                </div>
            </div>


        </div>
    </div>
@stop


@include('components.confirm-modal')
