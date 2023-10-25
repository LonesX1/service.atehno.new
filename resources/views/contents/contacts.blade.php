<div class="contact-page-map d-flex flex-column">
    <div class="container-fluid map-wrapper order-last order-md-last p-0" style="height: 100vh">
        <iframe style="width: 100%; height: 100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" id="gmap_canvas" src="https://maps.google.com/maps?width=967&amp;height=400&amp;hl=en&amp;q=Str.%20Stefan%20cel%20Mare%2076%22A%22%20%20Balti+()&amp;t=&amp;z=15&amp;ie=UTF8&amp;iwloc=B&amp;output=embed&ll=47.752153,27.921055"></iframe> <a href='http://maps-generator.com/ru'>Generator Google Map</a> <script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=64b944df48c1d7953f95b033f980d871f8a3efb1'></script>
    </div>
    <div class="contact-us-area box-contact">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="contact-us-inner">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="contact-form-area">
                                    <h3>Написать нам</h3>
                                    <div class="contact-form-warp">
                                        <form action="/order" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="input-box">
                                                        <input type="text" name="name" placeholder="Ваше имя">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="input-box">
                                                        <input type="email" name="mail" placeholder="E-mail">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="input-box">
                                                        <textarea name="about" placeholder="Сообщение"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="contact-submit-btn">
                                                <button type="submit" class="submit-btn default-btn">Отправить сообщение</button>
                                                <p class="form-messege"></p>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 offset-lg-1">
                                <div class="contact-info-wrap">
                                    <div class="single-contact-info">
                                        <h3>Наши координаты</h3>
                                        @if (setting('site.address_balti') !== null)
                                            <p>{{ setting('site.address_balti') }}</p>
                                        @endif
                                        @if (setting('site.address_chisinau') !== null)
                                            <p>{{ setting('site.address_chisinau') }}</p>
                                        @endif
                                    </div>
                                    <div class="single-contact-info">
                                        <h3>Телефон</h3>
                                        <p><a href="tel:+37323163090">+373 231 6-30-90</a></p>
                                    </div>
                                    <div class="single-contact-info">
                                        <h3>E-mail</h3>
                                        <p><a href="mailto:service@atehno.md">service@atehno.md</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>