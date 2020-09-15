@forelse($lists as $list)

    <!-- Start of Task List card-->

    <div class="card-item">
        <div class="card text-white tapable hoverable mr-2 animated fadeInRight bg-{{ $list['color'] }}"
             onclick="goTo('{{ route('tasks-lists.show', $list['id']) }}')"
             style="height: 205px; width: 170px">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">

                        {{-- List Title Start --}}
                        <div class="card-title font-weight-bold text-truncate pr-2 mb-1">
                            {{ ucfirst($list['title']) }}
                        </div>

                        <hr style="width: 140px;" class="mr-0 bg-white mb-0 ">
                        {{-- List Title End --}}

                        {{-- List Items Start (max 5) --}}

                        @foreach($list['tasks'] as $task)
                            <p class="text-truncate line-height-1 pb-0 mb-2">
                                <small class="{{ $task['completed_at'] !== null ? 'line-through text-white-50' : '' }}">
                                    {{ $task['body'] }}
                                </small>
                            </p>
                        @endforeach

                        {{-- List Items End --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Task List card-->

@empty
    <p class="text-center text-warning ml-4 mr-4 mb-5">No Tasks Lists! Tap <i class="fa fa-plus-square text-{{ $color }}"></i> to Add New List.</p>

@endforelse
