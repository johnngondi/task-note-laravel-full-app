
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
                        <form id="add-note-form" class="" action="{{ $formAction }}" method="POST">
                            @csrf
                            @method($method)

                            <div class="form-group col-12 text-center">
                                <label for="title">{{ ucwords($caption) }} Title</label>
                                <input type="text"
                                       id="title"
                                       class="form-control"
                                       name="title"
                                       value="{{ old('title', $title) }}"
                                       placeholder="What's the {{ ucwords($caption) }} about?"
                                       autocomplete="off"
                                >
                                <div class="invalid-feedback">
                                    Please provide a Title.
                                </div>
                            </div>

                            <div class="form-group col-12 text-center">
                                <label for="body">{{ ucwords($caption) }} Title</label>
                                <textarea type="text"
                                          id="body"
                                          class="form-control"
                                          name="body"
                                          placeholder="What's crackin'?"
                                          rows="3"
                                >{{ old('body', $body) }}</textarea>
                                <div class="invalid-feedback">
                                    Please provide a Body.
                                </div>
                            </div>

                            <div class="form-group col-12 text-center">
                                <p class="mb-0">Select Category</p>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">

                                    <label class="btn btn-sm btn-outline-info tapable">
                                        <input type="radio"
                                               name="category"
                                               id="info"
                                               value="personal"
                                               @if ($category == 'personal')
                                               checked
                                               @endif
                                        >
                                        Personal
                                    </label>

                                    <label class="btn btn-sm btn-outline-warning tapable">
                                        <input type="radio"
                                               name="category"
                                               id="warning"
                                               value="study"
                                               @if ($category == 'study')
                                               checked
                                               @endif
                                        >
                                        Study
                                    </label>

                                    <label class="btn btn-sm btn-outline-danger tapable">
                                        <input type="radio"
                                               name="category"
                                               id="danger"
                                               value="work"
                                               @if ($category == 'work')
                                               checked
                                               @endif
                                        >
                                        Work
                                    </label>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button id="btn-save"
                                class="btn btn-primary btn-sm"
                                form="add-note-form">

                            <i class="fa fa-plus-circle"></i>
                            Save {{ ucwords($caption) }}

                        </button>
                    </div>
                </div>
            </div>

            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-1 col-xs-12"></div>
        </div>

    </div>
</div>
<!-- End of Add Modal -->
