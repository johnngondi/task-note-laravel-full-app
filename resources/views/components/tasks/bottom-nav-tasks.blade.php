<!-- Bottom navigation -->
<div class="bottom-nav border-top bg-white animated fadeInDown">
    <div class="row text-center">

        <div class="col-8 pt-4 bottom-nav-item bottom-nav-item-active">
            <form id="update-task-list-form" class="" action="" method="POST">
                @method('PUT')
                @csrf
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-outline-primary tapable"
                           data-toggle="tooltip"
                           data-placement="bottom"
                           title="Blue"
                    >
                        <input type="radio"
                               name="color"
                               onchange="updateTaskColor('primary')"
                               id="primary"
                               value="primary"
                               @if ($color === 'primary')
                                   checked
                               @endif
                        >
                    </label>

                    <label class="btn btn-outline-info tapable"
                           data-toggle="tooltip"
                           data-placement="bottom"
                           title="Light Blue"
                    >
                        <input type="radio"
                               name="color"
                               onchange="updateTaskColor('info')"
                               id="info"
                               value="info"
                               @if ($color === 'info')
                                   checked
                               @endif
                        >
                    </label>

                    <label class="btn btn-outline-success tapable"
                           data-toggle="tooltip"
                           data-placement="bottom"
                           title="Green"
                    >
                        <input type="radio"
                               name="color"
                               onchange="updateTaskColor('success')"
                               id="success"
                               value="success"
                               @if ($color === 'success')
                                   checked
                               @endif
                        >
                    </label>

                    <label class="btn btn-outline-warning tapable"
                           data-toggle="tooltip"
                           data-placement="bottom"
                           title="Gold"
                    >
                        <input type="radio"
                               name="color"
                               onchange="updateTaskColor('warning')"
                               id="warning"
                               value="warning"
                               @if ($color === 'warning')
                                   checked
                               @endif
                        >
                    </label>

                    <label class="btn btn-outline-danger tapable"
                           data-toggle="tooltip"
                           data-placement="bottom"
                           title="Ruby Red"
                    >
                        <input type="radio"
                               name="color"
                               onchange="updateTaskColor('danger')"
                               id="danger"
                               value="danger"
                               @if ($color === 'danger')
                                   checked
                               @endif
                        >
                    </label>
                </div>

            </form>
        </div>

        <div class="col-4 bottom-nav-item pb-3 pt-3">
            <!-- Add Popup button -->
            <button class="btn btn-{{ $color }} font-weight-light"
                    onclick="$('#addModal').modal('show')"
                    data-toggle="tooltip"
                    data-placement="top"
                    id="btn-add-task"
                    title="Add Task">

                <i class="fa fa-plus"></i>

            </button>
            <!-- Add Popup button -->
        </div>

    </div>
</div>
<!-- Bottom navigation -->
