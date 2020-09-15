
<i class="fa fa-trash-alt text-danger display-5 mr-4 tapable"
   data-toggle="tooltip"
   data-placement="top"
   onclick="{{ $jsMethod }}({{ $id }},'{{ $title}}');"
   title="{{ $delete }}"></i>

<i class="fa fa-times display-5 text-muted tapable"
   onclick="location.href = '/{{ $backUrl }}'"
   data-toggle="tooltip"
   data-placement="top"
   title="{{ $close }}"></i>

