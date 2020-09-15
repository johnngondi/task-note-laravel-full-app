
@forelse($tasks as $task)
<!-- task item start -->
<div id="task-{{ $task->id }}" class="row animated fadeInUp pl-3 pr-2 mt-1">
    <div class="col-2">

        @if ($task->completed_at === null)
            <div id="task-check-complete-{{ $task->id }}" class="custom-control custom-checkbox ">
                <input id="task-check-{{ $task->id }}"
                       onchange="markTaskAsDone({{ $task->id }})"
                       class="custom-control-input"
                       type="checkbox">
                <label class="custom-control-label tapable" for="task-check-{{ $task->id }}"></label>
            </div>
        @endif

    </div>

    <div class="col-10 pl-0 ">
        @if ($task->completed_at === null)
            <i id="task-delete-{{ $task->id }}" class="fa fa-minus-circle text-danger float-right mt-1 mr-2 tapable"
               onclick="deleteTask({{ $task->id }})"
               data-toggle="tooltip"
               data-placement="left"
               title="Delete Task"
            ></i>
        @endif
        <p id="task-body-{{ $task->id }}" onclick="showTask('{{ ucfirst($task->body) }}', '{{ date('d M Y', strtotime($task->updated_at)) }}', '{{ date('d M Y', strtotime($task->completed_at)) }}')"
           class="font-weight-light text-truncate pr-2 {{ $task->completed_at === null ? 'tapable' : 'complete-task line-through text-'. $color}} ">
            <strong class="">{{ ucfirst($task->body) }}</strong>
        </p>
        <hr>
    </div>
</div>
<!-- task item end -->
@empty
    <p class="text-center text-warning ml-4 mr-4">No Tasks! Tap <i class="fa fa-plus-square text-{{ $color }}"></i> to Add New Task.</p>
@endforelse

<form id="complete-task-form" action="task/null" method="POST">
    @csrf
    @method('PUT')
</form>



