
<!-- Start of add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog pt-5" role="document">

        <div class="row mt-5 animated bounceIn">
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-1 col-xs-12"></div>

            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-10 col-xs-12">
                <div class="modal-content">
                    <div class="modal-header">

                        <h5 class="modal-title" id="exampleModalLongTitle">
                            Add {{ ucwords($caption) }}
                        </h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="add-form" class="" action="{{ $formAction }}" method="POST">

                            @csrf
                            <input type="hidden" name="tasks_list_id" value="{{ isset($list_id) ? $list_id : '' }}">
                            <div class="form-group col-12 text-center">
                                <label for="title">{{ ucwords($caption) }} Title</label>
                                <input type="text"
                                       id="title"
                                       class="form-control"
                                       name="title"
                                       placeholder="Enter {{ ucwords($caption) }} Title"
                                       autocomplete="off"
                                >
                                <div class="invalid-feedback">
                                    Please provide a Title.
                                </div>
                            </div>

                            @if ($location == 'tasks-lists')
                                <div class="form-group col-12 text-center">
                                    <p class="mb-0">Select Color</p>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-outline-primary tapable"
                                               data-toggle="tooltip"
                                               data-placement="bottom"
                                               title="Blue">
                                            <input type="radio"
                                                   name="color"
                                                   id="primary"
                                                   value="primary"
                                                   checked
                                            >
                                        </label>

                                        <label class="btn btn-outline-info tapable"
                                               data-toggle="tooltip"
                                               data-placement="bottom"
                                               title="Light Blue">
                                            <input type="radio"
                                                   name="color"
                                                   id="info"
                                                   value="info"
                                            >
                                        </label>

                                        <label class="btn btn-outline-success tapable"
                                               data-toggle="tooltip"
                                               data-placement="bottom"
                                               title="Green">
                                            <input type="radio"
                                                   name="color"
                                                   id="success"
                                                   value="success"
                                            >
                                        </label>

                                        <label class="btn btn-outline-warning tapable"
                                               data-toggle="tooltip"
                                               data-placement="bottom"
                                               title="Gold">
                                            <input type="radio"
                                                   name="color"
                                                   id="warning"
                                                   value="warning"
                                            >
                                        </label>

                                        <label class="btn btn-outline-danger tapable"
                                               data-toggle="tooltip"
                                               data-placement="bottom"
                                               title="Ruby Red">
                                            <input type="radio"
                                                   name="color"
                                                   id="danger"
                                                   value="danger"
                                            >
                                        </label>
                                    </div>
                                </div>
                            @endif

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button id="btn-save"
                                class="btn btn-{{ isset($color) ? $color : 'primary'}} btn-sm"
                                form="add-form">

                            <i class="fa fa-plus-circle"></i>
                            Add {{ ucwords($caption) }}

                        </button>
                    </div>
                </div>
            </div>

            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-1 col-xs-12"></div>
        </div>

    </div>
</div>
<!-- End of Add Modal -->
