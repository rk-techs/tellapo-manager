@if (session('action'))
<div class="alert alert-{{ session('action') }}">
    {{ session('message') }}
</div>
@endif
