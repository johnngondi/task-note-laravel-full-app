
<!-- Start of Task Modal -->
<div class="modal fade pt-5" id="taskModal" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog pt-5 mt-4" role="document">

        <div class="row mt-5 animated bounceIn">
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-1 col-xs-12"></div>

            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-10 col-xs-12">
                <div class="modal-content">
                    <div class="modal-body">
                        <p>
                            <strong>Task: </strong><br>
                            <span id="task-info"></span>
                        </p>
                        <p>
                            <strong>Date: </strong>
                            <span id="task-date"></span>
                        </p>

                        <div class="text-right">
                            <button onclick="$('#taskModal').modal('hide')" id="btn-show-task" class="btn btn-sm btn-outline-{{ $color }}">Ok</button>
                        </div>

                    </div>

                </div>
            </div>

            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-1 col-xs-12"></div>
        </div>

    </div>
</div>
<!-- End of Task Modal -->
