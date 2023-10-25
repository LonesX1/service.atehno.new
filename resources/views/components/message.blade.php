@if (session('message'))    
<div class="alert alert-success alert-dismissible fade show" role="alert" style="position: absolute; width: 100%; z-index: 999; border-radius: 0">
    <strong>{{ session('message') }}</strong> Наши специалисты свяжутся с Вами в скором времени.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif