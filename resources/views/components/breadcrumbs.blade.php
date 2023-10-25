<div class="breadcrumb-area bg-image" data-black-overlay="4" style="background-image: url('/images/bg/breadcrumb-bg-{{ $page_alias }}.jpg');">
    <div class="container">
        <div class="in-breadcrumb">
            <div class="row">
                <div class="col text-center">
                    <h3>{{ $page_title }}</h3>
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Главная</a></li>
                        <li class="breadcrumb-item active">{{ $page_title }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>