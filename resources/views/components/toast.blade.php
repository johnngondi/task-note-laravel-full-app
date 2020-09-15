<!-- Toast Start -->
<div id="myToast" role="alert" aria-live="assertive" aria-atomic="true" class="toast ml-2" data-delay="1000" style="position: absolute; bottom: 80px; right: 10px;">
    <div class="toast-header">
        <span id="toast-status"><i class="fa fa-exclamation-circle"></i></span> <strong id="toast-title" class="mr-auto ml-2"> </strong>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div id="toast-body" class="toast-body">

    </div>

    <div id="btn-undo" class="pb-2 text-center">
        <button class="btn btn-outline-primary btn-sm"
                onclick="undo()"
        >
            <i class="fa fa-undo"></i>
            Undo
        </button>
    </div>

</div>
<!-- Toast End -->
