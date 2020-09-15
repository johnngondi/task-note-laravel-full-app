<form id="delete-form" action="{{ $route }}" method="POST">
    @csrf
    @method('DELETE')
    <input type="hidden" id="id" name="id" value="">
</form>
