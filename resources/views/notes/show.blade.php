@extends('layouts.app')

@section('actions')
    @component('components.actions',[
        'delete' => 'Delete Note',
        'close' => 'Back to Notes',
        'backUrl' => 'notes',
        'jsMethod' => 'deleteNote',
        'id' => $note->id,
        'title' => ucfirst($note->title)
    ])
    @endcomponent
@endsection

@section('content')

    <div class="row mt-3">
        <div class="col-2"></div>
        <div class="col-10 animated fadeIn">

            <h4 class="font-weight-normal text-truncate pr-2 mb-0">
                <strong class="">{{ $note->title }}</strong>
            </h4>

            <small
                class="text-{{ $note->category == 'personal' ? 'info' : '' }}{{ $note->category == 'work' ? 'danger' : '' }}{{ $note->category == 'study' ? 'warning' : '' }}"
            >{{ ucwords($note->category) }}</small>
            <hr class="border">
        </div>
    </div>

    <div class="row mt-0">
        <div class="col-2"></div>
        <div class="col-10 tasks-wrapper pt-0 pb-5 pr-5">
            {{ $note->body }}
        </div>
    </div>

    <!-- Bottom navigation -->
    <div class="bottom-nav border-top bg-white animated fadeInDown">
        <div class="row text-center">

            <div class="col-8 pt-4 bottom-nav-item bottom-nav-item-active">

            </div>

            <div class="col-4 bottom-nav-item pb-3 pt-3">
                <!-- Add Popup button -->
                <button class="btn btn-{{ $note->category == 'personal' ? 'info' : '' }}{{ $note->category == 'work' ? 'danger' : '' }}{{ $note->category == 'study' ? 'warning' : '' }}"
                        onclick="$('#addModal').modal('show')"
                        data-toggle="tooltip"
                        data-placement="top"
                        id="btn-edit-note"
                        title="Edit Note">

                    <i class="fa fa-edit"></i>

                </button>
                <!-- Add Popup button -->
            </div>

        </div>
    </div>
    <!-- Bottom navigation -->


    @component('components.delete-form',[
        'route' => route('notes.destroy', $note->id)
    ])
    @endcomponent


    @component('components.notes.add-modal', [
        'location' => 'notes',
        'caption' => 'Note',
        'formAction' => '',
        'title' => $note->title,
        'body' => $note->body,
        'category' => $note->category,
        'method' => "PUT"
    ])
    @endcomponent

    @include('components.confirm-modal')


@endsection
