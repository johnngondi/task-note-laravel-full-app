@extends('layouts.app')

@section('content')
    <div class="row mt-5">
        <div class="col-12 text-center animated fadeIn">
            <hr>
            <h3 class="font-weight-light" style="margin-top: -38px;">
                            <span class="bg-white pl-3 pr-3">
                                <strong>Tasks</strong>
                                <span class="text-muted">Lists</span>
                            </span>
            </h3>
        </div>
    </div>

    {{--    Add Icon Start--}}
    @component('components.add-icon', [
        'title' => 'Add List'
    ])
    @endcomponent
    {{--    Add Icon Start--}}

    <div class="pl-2 mt-5 pb-3 pr-5 ml-0 cards-wrapper">

    {{--    Task Item Companent start    --}}
        @component('components.tasks.list-item', [
            'lists' => $tasksLists,
            'color' => 'muted'
        ])
        @endcomponent
    {{--    Task Item Companent end    --}}

    </div>

    @component('components.tasks.add-modal', [
        'location' => 'tasks-lists',
        'caption' => 'List',
        'formAction' => route('tasks-lists.store')
    ])
    @endcomponent

    @component('components.bottom-nav')
    @endcomponent
@endsection

