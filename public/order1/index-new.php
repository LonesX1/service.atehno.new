<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATEHNO | Заказы</title>
    <link rel="stylesheet" href="assets/style/style.css">
</head>
<body>

    <div class="wrapper">
        <div class="content-wrapper">
            <div class="logo">
                <img src="assets/images/logo.png" alt="logo" width="280px">
            </div>
            <div class="panel">
                <h1 class="result-h">Введите номер заказа</h1>
                <div class="fields result-h">
                    <div class="cell active">
                        <span></span>
                    </div>
                    <div class="cell">
                        <span></span>
                    </div>
                    <div class="cell">
                        <span></span>
                    </div>
                    <div class="cell">
                        <span></span>
                    </div>
                    <div class="cell">
                        <span></span>
                    </div>
                </div>
                <div class="button-group result-h">
                    <div class="button key-take active" type="button">Забрать товар</div>
                    <div class="button key-find" type="button">Узнать статус товара</div>
                </div>
            </div>
            <div class="keyboard result-h">
                <div class="row">
                    <button class="cell key">1</button>
                    <button class="cell key">2</button>
                    <button class="cell key">3</button>
                    <button class="cell key">4</button>
                    <button class="cell key">5</button>
                    <button class="button key-remove">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2M3 12l6.414 6.414a2 2 0 001.414.586H19a2 2 0 002-2V7a2 2 0 00-2-2h-8.172a2 2 0 00-1.414.586L3 12z" />
                        </svg>
                        <span>Удалить</span>
                    </button>
                </div>
                <div class="row">
                    <button class="cell key">6</button>
                    <button class="cell key">7</button>
                    <button class="cell key">8</button>
                    <button class="cell key">9</button>
                    <button class="cell key">0</button>
                    <form action="assets/post/feedback.php" id="getdata" method="POST">
                        <input name="code" type="text" id="code" value="" hidden required>
                        <input name="type" type="text" id="type" value="" hidden required>
                        <button class="button key-send" disabled>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>Отправить</span>
                        </button>
                    </form>
                </div>
            </div>
            <div class="help">
                <button class="button key-help">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Нужна помощь?</span>
                </button>
            </div>
            <div class="waves-wrapper">
                <div id="waves"></div>
            </div>
        </div>
        <div class="help-wrapper">
            <div class="heading">
                <h2>Как пользоваться?</h2>
                <button class="button key-close">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="content">
                <p><span>1. </span>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Omnis aut ex debitis officiis eos!</p>
                <p><span>2. </span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum corporis numquam, sunt quasi a facere, nobis quibusdam inventore, obcaecati quisquam explicabo.</p>
                <p><span>3. </span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla ipsum facilis quidem quam. Ea, sapiente similique.</p>
            </div>
        </div>
    </div>

    <form action="assets/post/post2.php" method="POST" id="tes2t">
        <input type="text" name="code">
        <button>send</button>
    </form>
    <div id="test2"></div>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="assets/scripts/wave.min.js"></script>
    <script>
        wave = new Wave ('#waves', {
            number: 7,
            smooth: 70,
            velocity: 1,
            height: 0.2,
            colors: ['#e5e5e5'],
            border: {
                show: true,
                width: 1,
                color: ['#d4d4d4']
            },
            opacity: .3,
        })

        wave.animate()
    </script>
    <script>
        $('button.key').on('click', function () {
            value = $(this).html();
            $('.fields .cell.active span').html(value);

            $('.fields .cell.active').next('.cell').addClass('active');
            $('.fields .cell.active').first().removeClass('active');

            checkEmpty();
            checkComplete();
        })

        $('button.key-remove').on('click', function () {

            if ($('.fields .cell').hasClass('active')) {
            } else {
                $('.fields .cell').last().addClass('active');
            }

            if ($('.fields .cell.active span').html() == '') {
                $('.fields .cell.active').prev('.cell').addClass('active');
                $('.fields .cell.active').last().removeClass('active');
            }

            $('.fields .cell.active span').empty();

            checkEmpty();
            checkComplete();
        })

        function checkEmpty () {
            if ($('.fields .cell span').text().length == 0) {
                $('.fields .cell').removeClass('active');
                $('.fields .cell').first().addClass('active');
            }
        }

        function checkComplete () {

            length = 0;
            $('.fields .cell').each(function () {
                length = length + $(this).find('span').html().length;
            });

            if (length == 5) {
                $('.key-send').addClass('active').attr("disabled", false);
                getCode();
            } else {
                $('.key-send').removeClass('active').attr("disabled", true);
            }
        }

        function getCode () {
            code = '';
            $('.fields .cell').each(function () {
                code = code + $(this).find('span').html();
            });

            type = '';
            if ($('.btn-group .key-take').hasClass('active')) {
                type = 'Забрать товар';
            } else {
                type = 'Узнать статус товара'
            }

            // $('.keyboard form input#code').html(code);
            // $('.keyboard form input#type').html(type);
            
            $('.keyboard form input#code').attr('value', code);
            $('.keyboard form input#type').attr('value', type);

        }

        $('.button-group .button').on('click', function () {
            $('.button-group .button').removeClass('active');
            $(this).addClass('active');
        })

        $('.key-help').on('click', function () {
            $('.help-wrapper').toggleClass('active');
        })

        $('.help-wrapper .key-close').on('click', function () {
            $('.help-wrapper').toggleClass('active');
        })
    </script>
    <script>
        $("#test").submit(function(e) {

        e.preventDefault();

        var form = $(this);
        var url = form.attr('action');

        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(),
            success: function(data)
                {
                    $('body .wrapper').addClass('result').find('.panel').append('<h1 class="result-heading">' + data + '</h1>');
                    setTimeout(reset, 5000);
                }
            });
        });
    </script>
</body>
</html>