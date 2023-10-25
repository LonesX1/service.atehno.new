<div class="modal fade" id="orderModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="ordernew" method="POST"  enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Разместить задание</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body contact-form-warp">
                    <div class="input-box">
                        <input type="text" minlength="3" name="name" placeholder="Ваше имя" required>
                    </div>
                    <div class="input-box">
                        <input type="email" minlength="8" name="mail" placeholder="E-mail" required>
                    </div>
                    <div class="input-box">
                        <input class="tel" minlength="9" pattern=".{0}|.{9}" name="phone" placeholder="Номер телефона. прим. 023112345 или 069123456" required>
                    </div>
                    <div class="input-box">
                        <input type="text" minlength="2" name="product" placeholder="Название Вашей техники" required>
                    </div>
                    <div class="input-box">
                        <textarea name="about" minlength="6" cols="30" rows="10" placeholder="Опишите Вашу проблему" required></textarea>
                    </div>
                    <div class="input-box">
                        <p>Прикрепите фото или видео:</p>
                        <input type="file" name="images[]" placeholder="Название Вашей техники" multiple/>
                    </div>
                    <div class="input-box">
                        <p>Введите код: <span id="code-box"></span></p>
                        <input id="code" type="text" placeholder="Код" required/>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <div class="g-recaptcha" data-sitekey="653720149772-62d056lgh4bfgrgork-nkse-s8d"></div> -->
                    <button type="submit" id="form-button" class="default-btn" disabled style="cursor: not-allowed">Отправить</button>
                </div>
            </div>
        </form>
    </div>
</div>
