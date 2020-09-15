<!-- Bottom navigation -->
<div class="bottom-nav border-top bg-white animated fadeInDown">
    <div class="row text-center">

        <div onclick="goTo('tasks-lists')"
            class="col-4 border-right pb-2 pt-3 mb-2 tapable bottom-nav-item
                    {{ Request::path() === 'tasks-lists' ? 'bottom-nav-item-active' : '' }} ">

            <i class="fa fa-list"></i>

        </div>

        <div onclick="goTo('notes')"
            class="col-4 border-right pb-2 pt-3 mb-2 tapable bottom-nav-item
                    {{ Request::path() === 'notes' ? 'bottom-nav-item-active' : '' }} ">

            <i class="far fa-file-alt"></i>

        </div>

        <div onclick="goTo('about')"
            class="col-4 tapable bottom-nav-item
                    {{ Request::path() === 'about' ? 'bottom-nav-item-active' : '' }}">

            <i class="fa fa-ellipsis-v pb-2 pt-3 mb-2"></i>

        </div>

    </div>
</div>
<!-- Bottom navigation -->
