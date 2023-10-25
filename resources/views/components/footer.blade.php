<footer class="footer-area bg-light-grey section-pt">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="footer-top pt--80 pb--120">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="footer-info mt--40">
                                <div class="footer-logo">
                                    <a href="#"><img src="/images/logo/logo-2.png" alt=""></a>
                                </div>
                                <p class="footer-text-info">Мы предлагаем воспользоваться всеми нашими знаниями и
                                    опытом, в решении проблем с вашими устройствами.</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="footer-info  mt--60">
                                <div class="footer-title">
                                    <h3>Контакты</h3>
                                </div>
                                <ul class="footer-list">
                                    @if (setting('site.address_balti') !== null)
                                        <li>{{ setting('site.address_balti') }}</li>
                                    @endif
                                    @if (setting('site.address_chisinau') !== null)
                                        <li>{{ setting('site.address_chisinau') }}</li>
                                    @endif
                                    <li><a href="#">service@atehno.md</a></li>
                                    <li><a href="callto:+37323163090"><i class="bi bi-phone"></i> 0(231) 6-30-90</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="footer-info  mt--60">
                                <div class="footer-title">
                                    <h3>Мы в интернете</h3>
                                </div>
                                <p>Наши странички в соц. сетях всегда рады Вам </p>
                                <ul class="social">
                                    <li><a href="https://www.facebook.com/atehno.md" target="_blank"><i
                                                class="fa fa-facebook"></i></a></li>
                                    <li><a href="http://ok.ru/atehno" target="_blank"><i
                                                class="fa fa-odnoklassniki"></i></a></li>
                                    <li><a href="https://www.instagram.com/atehno.md" target="_blank"><i
                                                class="fa fa-instagram"></i></a></li>
                                    <li><a href="http://vk.com/club86490904" target="_blank"><i
                                                class="fa fa-vk"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="footer-bottom-inner text-center">
                                <p>Copyright &copy; <a href="#">ATEHNO</a> 2020 All Right Reserved</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="/js/vendor/jquery-3.3.1.min.js"></script>
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/plugins.js"></script>
<script src="/js/ajax-mail.js"></script>
<script src="/js/main.js"></script>
<script>
    $('.tel').one('focus', function() {
        $(this).val('0');
    });
</script>
<script>
    $('.tel').on('input', function () {
        $(this).val($(this).val().replace(/\D/g,''));
    })
</script>
<script>
    $(document).ready(function () {
        code = '';
        for (let i = 0; i < 4; i++) {
            code = code + Math.floor(Math.random() * 10);
        }

        $('#code-box').html(code);
    });
</script>
<script>
    $('#code').on('input', function () {
        $(this).val($(this).val().replace(/\D/g,''));

        if ($(this).val() == $('#code-box').html()) {
            $('#form-button').prop("disabled", false);
            $('#form-button').css('cursor', 'pointer');
            $('input#code').css('border', '2px solid #32c976');
            $('#form').attr('action', '/order');
        } else {
            $('#form-button').prop("disabled", true);
            $('#form-button').css('cursor', 'not-allowed');
            $('input#code').css('border', '2px solid #eb4034');
            $('#form').attr('action', '');
        }
    });
</script>
<script>
    $('#form textarea').on('input', function () {
        if ($(this).val().indexOf('http') > -1 || $(this).val().indexOf('.ru') > -1 || $(this).val().indexOf('.com') > -1 || $(this).val().indexOf('//') > -1 || $(this).val().indexOf('порно') > -1) {
            $(this).css('border', '2px solid #eb4034');
            $(this).val('Ссылки запрещены!');
            $('#form-button').prop("disabled", true);
            $('#form').attr('action', '');
        } else {
            $(this).css('border', '2px solid #32c976');
            $('#form-button').prop("disabled", false);
            $('#form').attr('action', '/order');
        }
    });
</script>
<script>
    $('#form input').on('input', function () {
        length = $(this).attr('minlength');
        current = $(this).val().length;
        
        if (current >= length) {
            $(this).css('border', '2px solid #32c976')
        }
    });
</script>
<script>
    $(function () {
        var tabActive = window.location.hash;
        if (tabActive.search("#tab") >= 0) {
            $('.dashboard-list li a.active').removeClass('active');
            $('.tab-pane.active').removeClass('active');

            $('a[href^="' + tabActive + '"]').addClass('active');
            $(tabActive).addClass('active');
        }
    })
</script>