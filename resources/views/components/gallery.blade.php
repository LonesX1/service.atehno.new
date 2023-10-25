<div class="work-gallery-area section-pt bg-light-grey">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 ml-auto mr-auto">
                <div class="section-title">
                    <h4>Встречаются неисправности разного типа.</h4>
                    <h2>Несколько <span>Примеров</span> от Нас. </h2>
                    <p>Мы регулярно обновляем базу фотографий неисправностей, с которыми нам приходится бороться изо дня в день.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="banner-area">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col-lg-12">
                    <div class="gallery-carousel">
                        @foreach ($galleries as $gallery)
                            <div class="item">
                                <div class="single-gallery-image">
                                    <div class="gallery-box">
                                        <a class="img-popup" href="/storage/{{ $gallery->image }}"><img src="/storage/{{ $gallery->image }}" alt="/storage/{{ $gallery->image }}"></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>