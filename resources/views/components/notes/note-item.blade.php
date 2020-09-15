
@forelse($notes as $note)

<!-- Start of Note card-->
<div class="card-item" onclick="goTo('note/{{ $note->id }}')">

    <div class="bd-callout bd-callout-{{ $note->category == 'personal' ? 'info' : '' }}{{ $note->category == 'work' ? 'danger' : '' }}{{ $note->category == 'study' ? 'warning' : '' }} tapable hoverable mr-2 animated fadeInRight"
         style="height: 205px; width: 170px">

        <div class="row pl-2">

            <div class="card-title font-weight-bold text-truncate pr-2 mb-0">
                <h4>{{ ucfirst($note->title) }}</h4>
            </div>

            <hr style="width: 150px;" class="mr-0 mt-1 mb-1">

            <p class="crop-text-6 line-height-1 pb-0 mb-2">
                <small class="">

                    {{ ucfirst($note->body) }}

                </small>
            </p>

        </div>

    </div>

</div>
<!-- End of Note card-->
@empty
    <p class="text-center text-warning ml-5 mr-4">No Notes! Tap <i class="fa fa-plus-square text-muted"></i> to Add New Note.</p>
@endforelse
