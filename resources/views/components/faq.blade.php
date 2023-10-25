<div class="frequently-ask-questions-area section-pt section-pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 ml-auto mr-auto">
                <div class="section-title">
                    <h4>Вопросы и ответы</h4>
                    <h2>Распространенные <span> неисправности</span> </h2>
                    <p>В нашем штате работают квалифицированные специалисты, имеющие многолетний опыт восстановления различных устройств. Мы используем исключительно высококачественные комплектующие, которые всегда имеются в наличии и под заказ.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="faq-style-wrap" id="faq-five">
                    @foreach ($faqs as $faq)
                        <div class="panel panel-default">
                            <div class="panel-heading bg-gray">
                                <h4 class="panel-title">
                                    <a id="octagon" @if (!$loop->first) class="collapsed" @endif role="button" data-toggle="collapse" data-target="#faq-collapse{{ $faq->id }}" @if ($loop->first) aria-expanded="true" @else aria-expanded="false" @endif aria-controls="faq-collapse{{ $faq->id }}">
                                        <span class="button-faq"></span> {{ $faq->question }}
                                    </a>
                                </h4>
                            </div>
                            <div id="faq-collapse{{ $faq->id }}" class="collapse @if ($loop->first) show @endif"  @if ($loop->first) aria-expanded="true" @else aria-expanded="false" @endif role="tabpane{{ $faq->id }}" data-parent="#faq-five">
                                <div class="panel-body">
                                    <p>{{ $faq->answer }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-6">
                <div class="faq-inner-image">
                    <div class="faq-inner-image-box">
                        <img src="/images/about/faq-mc-01.png" alt="" class="faq-inner-01 wow fadeInRight" data-wow-duration="2.6s">

                        <img src="/images/about/faq-mc-02.png" alt="" class="faq-inner-02 wow fadeInRight" data-wow-duration="0.5s">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>