@extends('layouts.app')

@section('aux-style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/libraries/docs.min.css') }}">
@endsection

@section('content')
    <div class="row mt-5">
        <div class="col-12 text-center animated fadeIn">
            <hr>
            <h3 class="font-weight-light" style="margin-top: -38px;">
                            <span class="bg-white pl-3 pr-3">
                                <strong>My</strong>
                                <span class="text-muted">Notes</span>
                            </span>
            </h3>
        </div>
    </div>

    {{--    Add Icon Start--}}
    @component('components.add-icon', [
        'title' => 'Add Note'
    ])
    @endcomponent
    {{--    Add Icon Start--}}

    <div class="pl-2 mt-3 pb-4 pr-5 ml-0 cards-wrapper">

        {{--    Note Item Component start    --}}
        @component('components.notes.note-item', [
            'notes' => $notes
        ])
        @endcomponent
        {{--    Note Item Component end    --}}

    </div>

    @component('components.notes.add-modal', [
        'location' => 'notes',
        'caption' => 'Note',
        'formAction' => 'notes',
        'title' => '',
        'body' => '',
        'category' => 'personal',
        'method' => ''
    ])
    @endcomponent

    @component('components.bottom-nav')
    @endcomponent
@endsection

