<div class="testimonial-area section-pt-custom">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 ml-auto mr-auto">
                <div class="section-title">
                    <h4>Отзывы</h4>
                    <h2>Ваши <span>рецензии</span></h2>
                    <p>Тут вы можете ознакомится с отзывами наших постоянных клиентов </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 mr-auto ml-auto testimonial-active">
                {{-- @php shuffle($testimonials) @endphp --}}
                @foreach ($testimonials as $testimonial)
                    <div class="testimonial-wrap text-center">
                        <div class="testimonial-image ">
                            <img src="/storage/{{ $testimonial->image }}" width="15%" alt="">
                        </div>
                        <div class="testimonial-content">
                            <p>{{ $testimonial->text }}</p>
                        </div>
                        <div class="author-info">
                            <h4>{{ $testimonial->name }}</h4>
                            <p>{{ $testimonial->position }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>