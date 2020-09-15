

<script>
    var taskCompleteCurrentColor = '{{ $tasksList->color }}';
</script>
@extends('layouts.app')

@section('actions')
    @component('components.actions',[
        'delete' => 'Delete Tasks List',
        'close' => 'Back to Tasks Lists',
        'backUrl' => 'tasks-lists',
        'jsMethod' => 'deleteList',
        'id' => $tasksList->id,
        'title' => ucfirst($tasksList->title)
    ])
    @endcomponent
@endsection

@section('content')
    <div class="row mt-5">
        <div class="col-2"></div>
        <div class="col-10 pl-0 animated fadeIn">

            <h4 class="font-weight-normal text-truncate pr-2 mb-0">
                <strong class="">{{ ucfirst($tasksList->title) }}</strong>
            </h4>
{{--            <small class="text-muted">2 of 7 Completed</small>--}}
            <hr class="border">
        </div>
    </div>
    <div class="tasks-wrapper pt-1 pb-5">

        @component('components.tasks.task-item', [
            'tasks' => $tasksList->tasks,
            'color' => $tasksList->color
        ])
        @endcomponent

    </div>
    @component('components.tasks.add-modal', [
        'location' => 'tasks-list',
        'caption' => 'Task',
        'formAction' => route('tasks.store'),
        'color' => $tasksList->color,
        'list_id' => $tasksList->id
    ])
    @endcomponent

    @component('components.tasks.bottom-nav-tasks',[
        'color' => $tasksList->color
    ])
    @endcomponent


    @component('components.delete-form',[
        'route' => route('tasks.destroy')
    ])
    @endcomponent

    @include('components.tasks.task-modal', [
        'color' => $tasksList->color
    ])

    @include('components.confirm-modal')

@endsection

