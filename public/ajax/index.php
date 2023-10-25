<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJAX</title>
    <link rel="stylesheet" href="assets/tailwind/tailwind.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <style>
        html {
            overflow-x: hidden;
        }
    </style>
    <?php
        $db = file_get_contents('assets/database/database.json');
        $db = json_decode($db, true);
    ?>
</head>
<body class="bg-gray-900 relative overflow-x-hidden">
    <div id="message" class="hidden flex flex-col w-max fixed top-8 right-8 md:right-16 z-20 bg-green-400 rounded-2xl p-8 shadow-2xl">
        <button id="message-btn" class="z-30 absolute right-6 md:right-8 top-8 rounded-full bg-green-200 p-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        <h1 class="z-20 font-light text-lg md:text-xl 2xl:text-2xl md:mb-2 text-white">Ваше сообщение отправлено!</h1>
        <span class="z-20 hidden md:block text-white">Наш менеджер свяжется с Вами в ближайшее время</span>
    </div>
    <div id="popup" class="flex flex-col w-full md:w-min fixed bottom-0 md:bottom-16 md:right-16 md:rounded-2xl bg-gray-200 px-8 md:px-16 py-6 md:py-8 z-20 shadow-2xl" data-aos="fade-up" data-aos-delay="500">
        <button id="popup-btn" class="z-30 absolute right-6 md:right-8 top-8 rounded-full bg-gray-300 p-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        <h1 class="z-20 font-light text-lg md:text-xl 2xl:text-2xl md:mb-2">Закажи бесплатную консультацию специалиста</h1>
        <span class="z-20 hidden md:block">Оставьте свой номер телефона и наш менеджер свяжется с Вами в ближайшее время</span>
        <button target-block="consult" class="z-20 mt-6 flex-shrink-0 flex-grow-0 w-max flex text-black flex-row gap-2 bg-green-300 duration-100 hover:bg-green-400 hover:text-white px-6 py-2 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
            </svg>
            <span>Получить консультацию</span>
        </button>
    </div>
    <div class="wrapper relative bg-gray-900 z-10">
        <div class="flex flex-col">
            <div class="flex flex-row justify-between px-8 2xl:px-32 py-8" data-aos="fade-down">
                <div class="flex flex-row gap-16">
                    <div class="flex flex-row items-center gap-8">
                        <a href="#">
                            <img src="assets/images/logo.svg" alt="atehno" width="64">
                        </a>
                        <span class="w-24 hidden lg:block">
                            <svg fill="white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 96 20" aria-label="Ajax logo"><path d="M74.69.88h-5.3l21.25 19.11h5.3L74.69.88M80.83 14.48l-6.13 5.51h-5.3l6.12-5.51h5.31M89.82 6.39L95.95.88h-5.3l-6.13 5.51h5.3M13.28.88l-2.17 3.11 11.07 16h4.38L13.28.88M7.66 8.97H12L4.38 19.99H0L7.66 8.97M53.24.88l-2.17 3.11 11.07 16h4.38L53.24.88M47.62 8.97h4.34l-7.62 11.02h-4.38l7.66-11.02M35.23.88l.01 11.7c-.01 1.9-.9 4.27-3.89 4.47h-1.09v2.94s.95 0 1.57.01c1.44.02 3.52-.68 4.81-2.06 1.81-1.92 2.03-4.37 2.03-5.55V.88h-3.44"></path></svg>
                        </span>
                    </div>
                    <div class="hidden xl:flex flex-row gap-6 text-white items-center">
                        <a href="#" class="hover:text-green-300 hover:underline">Продукты</a>
                        <a href="#" class="hover:text-green-300 hover:underline">Софт</a>
                        <a href="#" class="hover:text-green-300 hover:underline">Возможности</a>
                    </div>
                </div>
                <div class="hidden xl:flex flex-row items-center gap-8">
                    <div class="flex flex-row gap-6 text-white items-center">
                        <a href="tel:023163090" class="flex flex-row gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <span>0 (231) 6-30-90</span>
                        </a>
                        <a href="tel:+37379116050" class="flex flex-row gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <span>+373 79116050</span>
                        </a>
                    </div>
                    <button target-block="set" class="flex flex-row gap-2 bg-green-300 duration-100 hover:bg-green-400 hover:text-white px-6 py-2 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5" />
                        </svg>
                        <span>Собрать комплект</span>
                    </button>
                </div>
            </div>
            <div class="flex flex-col xl:flex-row px-8 2xl:px-32 lg:mt-16 gap-12 lg:gap-32 justify-between">
                <div class="flex flex-col gap-4 w-full lg:w-1/3 pt-8 md:pt-32 text-white" data-aos="fade-right">
                    <h1 class="text-5xl font-light">Искусство защищать</h1>
                    <h2 class="text-xl text-gray-500">Профессиональная система безопасности, которая оставляет проблемы за кадром</h2>
                    <div class="flex flex-col md:flex-row gap-4 pt-8">
                        <button target-block="set" class="flex-shrink-0 flex-grow-0 w-max flex text-black flex-row gap-2 bg-green-300 duration-100 hover:bg-green-400 hover:text-white px-6 py-2 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5" />
                            </svg>
                            <span>Собрать комплект</span>
                        </button>
                        <button target-block="consult" class="flex-shrink-0 flex-grow-0 w-max flex text-black flex-row gap-2 bg-white duration-100 hover:bg-gray-100 px-6 py-2 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <span>Получить консультацию</span>
                        </button>
                    </div>
                </div>
                <div class="w-full 2xl:w-2/3 rounded-2xl bg-gray-800 relative" data-aos="fade-left">
                    <a href="https://www.youtube.com/watch?v=0T5Sk6xCKek" target="_blank" class="absolute bottom-16 z-10 flex text-black flex-row gap-2 bg-green-300 duration-100 hover:bg-green-400 hover:text-white px-6 py-2 rounded-full" style="left: 50%; transform: translateX(-50%);">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>Смотреть видео</span>
                    </a>
                    <video class="w-full h-full rounded-2xl" autoplay loop muted poster="assets/images/placeholder.png">
                        <source src="assets/media/promo-sm.mp4" type="video/mp4">
                    </video>
                </div>
            </div>
        </div>
        <div class="flex flex-col md:flex-row gap-8 lg:gap-32 px-8 2xl:px-32 pb-32 mt-24 lg:text-center">
            <div class="flex flex-row md:flex-col w-full md:w-1/5 gap-4 md:gap-2 items-center" data-aos="fade-up">
                <img src="assets/images/intrusion.svg" class="w-16 lg:w-24" alt="intrusion">
                <span class="text-white">Отпугивает воров</span>
            </div>
            <div class="flex flex-row md:flex-col w-full md:w-1/5 gap-4 md:gap-2 items-center" data-aos="fade-up" data-aos-delay="50">
                <img src="assets/images/fire.svg" class="w-16 lg:w-24" alt="fire">
                <span class="text-white">Выявляет возгорание</span>
            </div>
            <div class="flex flex-row md:flex-col w-full md:w-1/5 gap-4 md:gap-2 items-center" data-aos="fade-up" data-aos-delay="100">
                <img src="assets/images/leaks.svg" class="w-16 lg:w-24" alt="leaks">
                <span class="text-white">Останавливает потоп</span>
            </div>
            <div class="flex flex-row md:flex-col w-full md:w-1/5 gap-4 md:gap-2 items-center" data-aos="fade-up" data-aos-delay="150">
                <img src="assets/images/surveillance.svg" class="w-16 lg:w-24" alt="surveillance">
                <span class="text-white">Показывает видео с камер</span>
            </div>
            <div class="flex flex-row md:flex-col w-full md:w-1/5 gap-4 md:gap-2 items-center" data-aos="fade-up" data-aos-delay="200">
                <img src="assets/images/automation.svg" class="w-16 lg:w-24" alt="automation">
                <span class="text-white">Контролирует приборы</span>
            </div>
        </div>
        <div class="flex flex-col text-center gap-8 px-8 2xl:px-32 py-32 bg-gray-800">
            <img class="mb-8" src="assets/images/ajax.png" alt="ajax" data-aos="fade-up">
            <span class="text-2xl text-gray-400 font-light" data-aos="fade-up" data-aos-delay="50">Самая титулованная беспроводная система безопасности в Европе. <br> Ajax умная, надежная и молниеносная. Она реагирует только на реальные опасности, а не на ложные тревоги. Если что-то случится, Ajax мгновенно уведомит вас и поможет предотвратить серьезные проблемы.</span>
            <span class="text-gray-300" data-aos="fade-up" data-aos-delay="150">Мы отказались от готовых решений и сконструировали Ajax с нуля. Объединили несуществовавшие ранее технологии с функциональным дизайном. Дополнили лучшими доступными компонентами. Бескомпромиссный подход к разработке позволил создать системы безопасности, которые нравятся людям, и доказали свою сверхнадежность профессионалам.</span>
        </div>
        <div class="flex flex-row gap-6 lg:gap-32 px-8 2xl:px-32 py-32">
            <div class="flex flex-col gap-8 w-full lg:w-1/2">
                <h1 class="text-2xl text-gray-400 font-light" data-aos="fade-right">Клик-клик — и дом под охраной</h1>
                <span class="text-gray-300" data-aos="fade-right" data-aos-delay="50">Мобильное приложение Ajax Security System превращает систему безопасности в гаджет с удобным управлением. Ставьте Ajax под охрану в несколько касаний. Включайте приборы по пути домой. Получайте уведомления моментально через скоростной протокол SwiftAlerts, которому позавидуют современные мессенджеры.</span>
                <div class="flex flex-col gap-8 mt-16">
                    <div class="flex flex-col md:flex-row gap-6">
                        <div class="flex flex-row w-full md:w-1/2 gap-4 items-center flex-shrink-0" data-aos="fade-up" data-aos-delay="50">
                            <img class="w-24" src="assets/images/app/log.svg" alt="device_status">
                            <span class="text-sm text-gray-400">Просматривайте список событий в ленте уведомлений</span>
                        </div>
                        <div class="flex flex-row w-full md:w-1/2 gap-4 items-center flex-shrink-0" data-aos="fade-up" data-aos-delay="100">
                            <img class="w-24" src="assets/images/app/instant_notification.svg" alt="device_status">
                            <span class="text-sm text-gray-400">Мгновенно узнавайте о тревогах с помощью push, смс или звонка</span>
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row gap-6">
                        <div class="flex flex-row w-full md:w-1/2 gap-4 items-center flex-shrink-0" data-aos="fade-up" data-aos-delay="150">
                            <img class="w-24" src="assets/images/app/device_status.svg" alt="device_status">
                            <span class="text-sm text-gray-400">Контролируйте показатели устройств в реальном времени</span>
                        </div>
                        <div class="flex flex-row w-full md:w-1/2 gap-4 items-center flex-shrink-0" data-aos="fade-up" data-aos-delay="200">
                            <img class="w-24" src="assets/images/app/log.svg" alt="device_status">
                            <span class="text-sm text-gray-400">Просматривайте список событий в ленте уведомлений</span>
                        </div>
                    </div>
                    <div class="flex flex-row gap-6">
                        <div class="flex flex-row w-full md:w-1/2 gap-4 items-center flex-shrink-0" data-aos="fade-up" data-aos-delay="250">
                            <img class="w-24" src="assets/images/app/settings.svg" alt="device_status">
                            <span class="text-sm text-gray-400">Меняйте конфигурации устройств на расстоянии</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hidden lg:flex flex-row w-1/2 rounded-2xl bg-gray-800" data-aos="fade-left" data-aos-delay="50">
                <img class="w-full" src="assets/images/app/iphone_notifications_ru@1x-1.png" alt="">
            </div>
        </div>
        <div class="flex flex-col gap-8 px-6 2xl:px-32">
            <div class="flex flex-col lg:flex-row gap-8">
                <div class="flex flex-col w-full lg:w-1/2 rounded-2xl bg-gray-200 p-8 lg:p-32 text-center gap-4 justify-center" data-aos="fade-up">
                    <h1 class="text-2xl font-light text-gray-900">Злоумышленники не пройдут незамеченными</h1>
                    <span class="text-gray-800 font-light">Датчики Ajax точно определяют вторжение менее чем за секунду. Устройства вооружены цифровыми алгоритмами и многофакторными моделями распознавания опасностей, которые вдобавок сводят ложные тревоги к нулю</span>
                </div>
                <div class="flex flex-col flex-shrink-0 w-full lg:w-1/2 rounded-2xl p-8 lg:p-32 text-center gap-4 bg-center bg-cover justify-center" style="background-image: url('assets/media/fire.gif');" data-aos="fade-up" data-aos-delay="150">
                    <h1 class="z-10 text-2xl font-light text-gray-200">Против огня, дыма и угарного газа</h1>
                    <span class="z-10 text-gray-300 font-light">Ajax быстро распознает пожар по первым признакам: дым или резко возросшая температура, когда огонь горит без выделения дыма. Дополнительный сенсор СО моментально срабатывает, если уровень угарного газа превышает норму.</span>
                </div>
            </div>
            <div class="flex flex-col lg:flex-row gap-8">
                <div class="flex flex-col lg:flex-row gap-8 w-full lg:w-1/2">
                    <div class="flex flex-col bg-gray-200 p-8 lg:p-12 text-center items-center gap-4 w-full lg:w-1/2 rounded-2xl justify-center" data-aos="fade-up" data-aos-delay="50">
                        <img class="bg-gray-100 rounded-full w-24" src="assets/images/home.svg" alt="home">
                        <h1 class="text-2xl font-light text-gray-900">Защита помещений</h1>
                        <span class="text-gray-800 font-light">Датчики движения, открытия и разбития надежно охраняют двери и окна, через которые можно проникнуть в помещение</span>
                    </div>
                    <div class="flex flex-col bg-gray-200 p-8 lg:p-12 text-center items-center gap-4 w-full lg:w-1/2 rounded-2xl justify-center" data-aos="fade-up" data-aos-delay="150">
                        <img class="bg-gray-100 rounded-full w-24" src="assets/images/outdoor.svg" alt="home">
                        <h1 class="text-2xl font-light text-gray-900">Уличная защита</h1>
                        <span class="text-gray-800 font-light">Датчики движения для улицы следят за придомовой территорией и мгновенно поднимают тревогу при появлении посторонних</span>
                    </div>
                </div>
                <div class="flex flex-col flex-shrink-0 w-full lg:w-1/2 rounded-2xl p-8 lg:p-32 text-center gap-4 bg-center bg-cover justify-center"  style="background-image: url('assets/media/leaks.gif');" data-aos="fade-up" data-aos-delay="250">
                    <h1 class="z-10 text-2xl font-light text-black">Ни капли проблем</h1>
                    <span class="z-10 text-gray-900 font-light">Ajax поднимает тревогу при первом контакте с влагой и отменяет ее после высыхания воды. Датчики разработаны с учетом воздействия воды на устройства: они не поддаются коррозии, защищены от попадания пыли и влаги.</span>
                </div>
            </div>
            <div class="flex flex-col lg:flex-row gap-8">
                <div class="flex flex-col w-full lg:w-1/2 rounded-2xl p-8 lg:p-32 text-center gap-4 bg-center bg-cover justify-center" style="background-image: url('assets/images/socket_light@1x.webp');" data-aos="fade-up" data-aos-delay="50">
                    <h1 class="z-10 text-2xl font-light text-gray-200">Умная безопасность</h1>
                    <span class="z-10 text-gray-300 font-light">Ajax перекроет воду при первых признаках протечки и включит прожекторы, если на участок проникнут посторонние, по расписанию погасит свет, отключит отопление и активирует охрану. Это умный дом, на который можно положиться.</span>
                </div>
                <div class="flex flex-col lg:flex-row gap-8 w-full lg:w-1/2 flex-shrink-0">
                    <div class="flex flex-col bg-gray-200 p-8 lg:p-12 text-center items-center gap-4 w-full lg:w-1/2 rounded-2xl justify-center" data-aos="fade-up" data-aos-delay="150">
                        <img class="bg-gray-100 rounded-full w-24" src="assets/images/no_tools.svg" alt="home">
                        <span class="text-gray-800 font-light">Для монтажа не понадобятся инструменты — нужно только положить датчики на пол</span>
                    </div>
                    <div class="flex flex-col bg-gray-200 p-8 lg:p-12 text-center items-center gap-4 w-full lg:w-1/2 rounded-2xl justify-center" data-aos="fade-up" data-aos-delay="250">
                        <img class="bg-gray-100 rounded-full w-24" src="assets/images/outdoor.svg" alt="home">
                        <span class="text-gray-800 font-light">Компактные размеры позволяют устанавливать датчики под стиральными и посудомоечными машинами</span>
                    </div>
                </div>
            </div>
            <div class="flex flex-row rounded-2xl lg:px-32 pt-8 lg:pt-32 text-center gap-32 bg-white" data-aos="fade-up" data-aos-delay="50">
                <img class="hidden lg:block w-1/3" src="assets/media/iPhone_camera_cropped.gif" alt="iPhone_camera" data-aos="fade-right" data-aos-delay="250">
                <div class="flex flex-col w-full lg:w-2/3 text-center gap-4 px-8 lg:px-16 pb-8 lg:pb-16 justify-center">
                    <h1 class="z-10 text-2xl font-light text-black" data-aos="fade-up" data-aos-delay="50">Наблюдение за домом в Full HD</h1>
                    <span class="z-10 text-gray-900 font-light" data-aos="fade-up" data-aos-delay="100">К Ajax подключаются видеокамеры, которые передают картину происходящего на ваш смартфон. Когда пришла тревога или хочется убедиться, что все в порядке, просто откройте мобильное приложение.</span>
                    <div class="flex flex-col md:flex-row gap-8 mt-8 lg:mt-16">
                        <div class="flex flex-col w-full text-center items-center gap-4 w-1/2" data-aos="fade-left" data-aos-delay="250">
                            <img class="bg-gray-100 rounded-full w-24" src="assets/images/surveillance-2.svg" alt="surveillance">
                            <span class="text-gray-800 font-light">Транслирует видео в реальном времени</span>
                        </div>
                        <div class="flex flex-col w-full text-center items-center gap-4 w-1/2" data-aos="fade-right" data-aos-delay="250">
                            <img class="bg-gray-100 rounded-full w-24" src="assets/images/camera.svg" alt="home">
                            <span class="text-gray-800 font-light">Работает с популярными IP-камерами</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col lg:flex-row gap-8">
                <div class="flex flex-col bg-gray-200 w-full lg:w-1/2 rounded-2xl p-8 lg:p-32 text-center gap-4 justify-center" data-aos="fade-left" data-aos-delay="50">
                    <h1 class="z-10 text-2xl font-light text-black">Установка без пыли и шума</h1>
                    <span class="z-10 text-gray-900 font-light">Система безопасности Ajax создана с мыслью о практичности. Поэтому для установки нужны смартфон, минимум инструментов и времени. Если вы снимаете жилье, то система сможет переехать в новый дом вместе с вами.</span>
                </div>
                <div class="flex flex-col bg-gray-200 w-full lg:w-1/2 rounded-2xl p-8 lg:p-32 text-center gap-4 justify-center" data-aos="fade-right" data-aos-delay="50">
                    <h1 class="z-10 text-2xl font-light text-black">Защита от случайностей и непредвиденных рисков</h1>
                    <span class="z-10 text-gray-900 font-light">В отличие от большинства систем безопасности, Ajax готова ко всему. И если что-то пошло не так, вы обязательно об этом узнаете.</span>
                </div>
            </div>
            <div class="flex flex-col lg:flex-row gap-8">
                <div class="flex flex-col bg-gray-200 rounded-2xl p-8 lg:p-32 gap-10 w-full lg:w-1/3" data-aos="fade-up" data-aos-delay="50">
                    <div class="flex flex-col text-center items-center gap-4" data-aos="fade-up" data-aos-delay="50">
                        <img class="bg-gray-100 rounded-full w-24" src="assets/images/qr.svg" alt="surveillance">
                        <span class="text-gray-800 font-light">Датчики подключаются в несколько кликов с помощью QR-кодов</span>
                    </div>
                    <div class="flex flex-col text-center items-center gap-4" data-aos="fade-up" data-aos-delay="150">
                        <img class="bg-gray-100 rounded-full w-24" src="assets/images/no_disassemble.svg" alt="home">
                        <span class="text-gray-800 font-light">Не нужно разбирать устройства перед монтажом</span>
                    </div>
                    <div class="flex flex-col text-center items-center gap-4" data-aos="fade-up" data-aos-delay="250">
                        <img class="bg-gray-100 rounded-full w-24" src="assets/images/batteries.svg" alt="home">
                        <span class="text-gray-800 font-light">Батарейки и крепления идут в комплекте с устройствами</span>
                    </div>
                </div>
                <div class="flex flex-col bg-gray-200 rounded-2xl p-8 lg:p-32 gap-16 w-full lg:w-2/3 justify-center" data-aos="fade-up" data-aos-delay="150">
                    <div class="flex flex-col md:flex-row gap-8">
                        <div class="flex flex-col text-center items-center gap-4 w-full md:w-1/2" data-aos="fade-up" data-aos-delay="50">
                            <img class="bg-gray-100 rounded-full w-24" src="assets/images/backup_battery.svg" alt="surveillance">
                            <span class="text-gray-800 font-regular">Резервный аккумулятор</span>
                            <span class="text-gray-800 font-light">Обеспечивает до 16 часов автономной работы, если пропадает электропитание</span>
                        </div>
                        <div class="flex flex-col text-center items-center gap-4 w-full md:w-1/2" data-aos="fade-up" data-aos-delay="150">
                            <img class="bg-gray-100 rounded-full w-24" src="assets/images/encryption.svg" alt="surveillance">
                            <span class="text-gray-800 font-regular">Шифрование радиопередачи</span>
                            <span class="text-gray-800 font-light">Алгоритм с плавающим кодом защищает данные от перехвата и подлога</span>
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row gap-8">
                        <div class="flex flex-col text-center items-center gap-4 w-full md:w-1/2" data-aos="fade-up" data-aos-delay="250">
                            <img class="bg-gray-100 rounded-full w-24" src="assets/images/authentication.svg" alt="surveillance">
                            <span class="text-gray-800 font-regular">Аутентификация устройств</span>
                            <span class="text-gray-800 font-light">Уникальный идентификатор исключает подмену датчиков</span>
                        </div>
                        <div class="flex flex-col text-center items-center gap-4 w-full md:w-1/2" data-aos="fade-up" data-aos-delay="350">
                            <img class="bg-gray-100 rounded-full w-24" src="assets/images/2channels.svg" alt="surveillance">
                            <span class="text-gray-800 font-regular">Четыре канала связи</span>
                            <span class="text-gray-800 font-light">Для отправки тревог система использует Ethernet, 2G, 3G или Wi-Fi</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form action="assets/post/post.php" method="POST" class="flex flex-col 2xl:px-32 py-32" id="set">
            <div class="flex flex-col pt-8 2xl:pt-16 gap-8 2xl:rounded-2xl bg-gray-200">
                <div class="flex flex-col px-8 2xl:px-24 gap-8">
                    <h1 class="text-2xl text-gray-800 font-light" data-aos="fade-in">Соберите свой комплект</h1>
                    <?php foreach ($db as $category_name => $category_data) { ?>
                        <?php if ($category_name == 'Hub') { ?>
                            <h1 class="text-2xl text-gray-800 font-light" data-aos="fade-in"><?php echo $category_name ?></h1>
                            <div class="flex flex-col lg:flex-row gap-8">
                                <?php $i = 1 ?>
                                <?php foreach ($category_data as $product_name => $product) { ?>
                                    <div class="flex flex-col gap-8 p-8 bg-white rounded-2xl lg:w-1/4 border-4 cursor-pointer hub-block <?php if ($i == 1) { ?> border-green-400 <?php } ?>" data-aos="fade-up" data-aos-delay="<?php echo ($i + 1)*50 ?>">
                                        <div class="flex flex-col relative" data-aos="fade-right">
                                            <img class="w-32 z-10" src="assets/images/products/black/<?php echo $product_name ?>.png" id="<?php echo $product_name ?>" alt="<?php echo $product_name ?>">
                                            <div class="select-icon p-6 bg-green-400 text-white rounded-2xl w-max absolute left-7 top-7 opacity-0 duration-150">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                </svg>
                                            </div>
                                            <div class="absolute w-24 h-24 top-4 left-4 shadow-2xl rounded-2xl"></div>
                                        </div>
                                        <?php if ($product["color"] == true) { ?>
                                            <div class="flex flex-row w-full gap-8 pl-3" data-aos="fade-left">
                                                <span>Цвет</span>
                                                <div class="color-button w-10 flex flex-row border-green-300 rounded-full border-2 cursor-pointer" target-product="<?php echo $product_name ?>" color="black">
                                                    <div class="p-2 w-5 rounded-full bg-green-400"></div>
                                                </div>
                                            </div>
                                            <div class="flex flex-col lg:gap-4 w-full">
                                                <a href="<?php echo $product["link"] ?>" target="_blank" target-product="<?php echo $product_name ?>" class="text-lg font-medium hover:text-green-300 hover:underline" data-aos="fade-left"><?php echo $product["name"] ?></a>
                                                <span data-aos="fade-left" data-aos-delay="50"><?php echo $product["description"] ?></span>
                                                <span class="text-xl w-full" data-aos="fade-left" data-aos-delay="100"><?php echo round($product["price"] * 17.9, -1) - 1 ?> лей</span>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <?php $i++ ?>
                                <?php } ?>
                            </div>
                        <?php } else { ?>
                            <h1 class="text-2xl text-gray-800 font-light" data-aos="fade-in"><?php echo $category_name ?></h1>
                            <?php foreach ($category_data as $product_name => $product) { ?>
                                <div class="flex flex-col lg:flex-row gap-6 lg:gap-16 items-center justify-between pb-10 bg-white rounded-2xl p-8" data-aos="fade-up">
                                    <div class="flex flex-col lg:flex-row lg:w-max gap-12">
                                        <div class="flex flex-col lg:flex-shrink-0 gap-4">
                                            <img class="w-32" src="assets/images/products/black/<?php echo $product_name ?>.png" id="<?php echo $product_name ?>" alt="<?php echo $product_name ?>" data-aos="fade-right">
                                            <?php if ($product["color"] == true) { ?>
                                                <div class="flex flex-row w-full gap-8 pl-3 lg:pl-0 lg:justify-center" data-aos="fade-left">
                                                    <span>Цвет</span>
                                                    <div class="color-button w-10 flex flex-row border-green-300 rounded-full border-2 cursor-pointer" target-product="<?php echo $product_name ?>" color="black">
                                                        <div class="p-2 w-5 rounded-full bg-green-400"></div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <div class="flex flex-col lg:gap-4 w-full">
                                            <a href="<?php echo $product["link"] ?>" target="_blank" target-product="<?php echo $product_name ?>" class="text-lg font-medium hover:text-green-300 hover:underline" data-aos="fade-left"><?php echo $product["name"] ?></a>
                                            <span data-aos="fade-left" data-aos-delay="50"><?php echo $product["description"] ?></span>
                                            <span class="text-xl w-full" data-aos="fade-left" data-aos-delay="100"><?php echo round($product["price"] * 17.9, -1) - 1 ?> лей</span>
                                        </div>
                                    </div>
                                    <div class="flex flex-col md:flex-row lg:justify-end w-full lg:w-max gap-8" data-aos="fade-left">
                                        <div class="q-button mt-2 lg:mt-0 flex flex-row" target-product="<?php echo $product_name ?>" data-aos="fade-left" data-aos-delay="150">
                                            <button type="button" class="minus px-3 rounded-l-full border-l-4 border-gray-200 focus:border-green-300 duration-150">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6" />
                                                </svg>
                                            </button>
                                            <span class="w-12 flex items-center justify-center text-sm">1</span>
                                            <button type="button" class="plus px-3 rounded-r-full border-r-4 border-gray-200 focus:border-green-300 duration-150">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                                </svg>
                                            </button>
                                        </div>
                                        <button type="button" target-product="<?php echo $product_name ?>" class="flex flex-row w-max gap-2 border-4 border-gray-200 duration-300 hover:border-green-300 duration-100 hover:bg-green-400 hover:text-white px-6 py-2 rounded-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <span>Добавить</span>
                                        </button>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                </div>
                <div class="flex flex-col py-8 2xl:py-16 px-8 2xl:px-24 gap-8 bg-gray-300 2xl:rounded-bl-2xl 2xl:rounded-br-2xl form-order-user-data">
                    <div class="flex flex-col lg:flex-row w-full gap-8">
                        <div class="flex flex-col gap-2 w-1/2">
                            <span class="text-gray-800 font-regular">Ваше имя</span>
                            <input type="text" minlength="3" maxlength="30" name="name" class="form-order w-full rounded-full border-4 border-gray-200 px-4 py-2 bg-gray-200" placeholder="Имя" required>
                        </div>
                        <div class="flex flex-col gap-2 w-1/2">
                            <span class="text-gray-800 font-regular">Ваш телефон</span>
                            <input type="tel" minlength="9" name="phone" class="form-order w-full rounded-full border-4 border-gray-200 px-4 py-2 bg-gray-200" placeholder="Телефон" required>
                        </div>
                    </div>
                    <button type="submit" id="contact" class="w-min flex flex-row gap-2 bg-green-400 border-4 border-green-400 text-white hover:border-green-300 duration-100 hover:bg-green-400 hover:text-white px-6 py-2 rounded-full">
                        <span>Отправить</span>
                    </button>
                </div>
            </div>
        </form>
        <div class="flex flex-col 2xl:px-32 pb-32" id="consult" data-aos="fade-up">
            <div class="flex flex-col px-8 2xl:px-32 py-8 2xl:py-16 gap-8 2xl:rounded-2xl bg-gray-200 relative">
                <h1 class="text-2xl text-gray-800 font-light" data-aos="fade-right">Бесплатная консультация специалиста</h1>
                <div class="flex flex-row gap-8">
                    <form method="POST" class="flex flex-col gap-8 w-full lg:w-1/3">
                        <div class="flex flex-col gap-2">
                            <span class="text-gray-800 font-regular">Ваше имя</span>
                            <input type="text" minlength="3" name="name" class="w-full rounded-full border-4 border-gray-300 px-4 py-2 bg-gray-200" placeholder="Имя" required>
                        </div>
                        <div class="flex flex-col gap-2">
                            <span class="text-gray-800 font-regular">Ваш телефон</span>
                            <input type="tel" minlength="9" name="phone" class="w-full rounded-full border-4 border-gray-300 px-4 py-2 bg-gray-200" placeholder="Телефон" required>
                        </div>
                        <button type="submit" id="contact" class="w-min flex flex-row gap-2 bg-green-400 border-4 border-gray-200 text-white hover:border-green-300 duration-100 hover:bg-green-400 hover:text-white px-6 py-2 rounded-full">
                            <span>Отправить</span>
                        </button>
                    </form>
                    <div class="flex w-2/3 absolute h-full bottom-0 right-32 pt-16 justify-end">
                        <img class="hidden md:block" src="assets/images/consult.png" alt="consult">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="flex flex-row gap-8 bg-gray-800 px-8 2xl:px-32 py-32 fixed bottom-0 left-0 w-full z-0" data-aos="fade-out">
        <div class="flex flex-col gap-4">
            <img class="w-24 mb-8" src="https://service.atehno.md/assets/images/logo.svg" alt="logo">
            <div class="flex flex-row gap-2 text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span>Молдова, г. Бельцы, Штефан чел Маре 76а</span>
            </div>
            <div class="flex flex-row gap-2 text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                </svg>
                <span>(0231) 6 30 90</span>
            </div>
            <div class="flex flex-row gap-2 text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <span>info@atehno.md</span>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
         $('.wrapper').css('margin-bottom', $('footer').outerHeight())
    </script>
    <script>
        AOS.init({
            offset: 20,
            once: true
        });
    </script>
    <script>
        $('.color-button').on('click', function () {
            $(this).toggleClass('justify-end');
            id = $(this).attr('target-product');
            value = $('#' + id).attr('src');
            button = $(this).parent('div').next().find('button');
            if ($(this).hasClass('justify-end')) {
                $(this).attr('color', 'white');
                value = value.replace('/black/', '/white/');
                button.attr('product', $(this).attr('product-white'));
            } else {
                $(this).attr('color', 'black');
                value = value.replace('/white/', '/black/');
                button.attr('product', $(this).attr('product-black'));
            }
            $('#' + id).attr('src', value);
        })
    </script>
    <script>
        $('button[target-product]').on('click', function () {
            if ($(this).hasClass('border-gray-200')) {
                $(this).removeClass('border-gray-200');
                $(this).addClass('bg-green-400 text-white border-green-300');
                $(this).find('svg').html('<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>')
                $(this).find('span').html('Выбрано');
            } else {
                $(this).removeClass('bg-green-400 text-white border-green-300');
                $(this).addClass('border-gray-200');
                $(this).find('svg').html('<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>')
                $(this).find('span').html('Добавить');
            }
        })
    </script>
    <script>
        $('button[target-block]').on('click', function () {
           target = $(this).attr('target-block');
           target = $('#' + target).offset().top;
           window.scrollTo({
                top: target - 28,
                behavior: "smooth"
            });
        })
    </script>
    <script>
        $('[type="tel"]').one('focus', function() {
            $(this).val('0');
        })
    </script>
    <script>
        $('[type="tel"]').on('input', function () {
            $(this).val($(this).val().replace(/\D/g,''));
        })
    </script>
    <script>
        $('#popup-btn').on('click', function () {
            $('#popup').remove();
        })
    </script>
    <script>
        $('#message-btn').on('click', function () {
            $('#message').remove();
        })
    </script>
    <script>
        $('.q-button button').on('click', function () {
            target = $(this).parent('.q-button').attr('target-product');
            value = $('.q-button[target-product="' + target + '"] span').html();
            if ($(this).hasClass('minus') && value > 1) {
                $(this).removeClass('focus:border-red-300');
                $(this).addClass('focus:border-green-300');
                $('.q-button[target-product="' + target + '"] span').html(value - 1);
            } else if ($(this).hasClass('plus')) {
                $('.q-button[target-product="' + target + '"] span').html(++value);
                $('.q-button button.minus').removeClass('focus:border-red-300');
            } else if ($(this).hasClass('minus') && value == 1) {
                $(this).removeClass('focus:border-green-300');
                $(this).addClass('focus:border-red-300');
            }
        })
    </script>
    <script>
        $(document).ready(function (){
            $("#set").on("submit", function(event){
                event.preventDefault();
        
                hub = $('.hub-block.border-green-400 a').html();
                hub_color = $('.hub-block.border-green-400 .color-button').attr('color');

                products = [];
                $('button[target-product]').each(function () {
                    if ($(this).hasClass('bg-green-400')) {
                        target = $(this).attr('target-product');
                        name = $('a[target-product="' + target + '"]').html();
                        quantity = $('.q-button[target-product="' + target + '"] span').html();
                        if ($('.color-button[target-product="' + target + '"]').length) {
                            if ($('.color-button[target-product="' + target + '"]').hasClass('justify-end')) {
                                color = 'white'
                            } else {
                                color = 'black'
                            }
                        } else {
                            color = 'default'
                        }

                        products.push({
                            'name': name,
                            'quantity': quantity,
                            'color': color
                        });
                    }
                });

                name = $('#set input[name="name"]').val();
                phone = $('#set input[name="phone"]').val();

                var formData = {
                    hub: hub,
                    hub_color: hub_color,
                    products: products,
                    name: name,
                    phone: phone
                };
        
                $.post("assets/post/post.php", formData, function(data){
                    $("#message").removeClass('hidden');
                });
            });
        });
    </script>
    <!-- <script>
        $('.form-order').on('input', function () {
            name = $('.form-order[type="text"]').val().length;
            phone = $('.form-order[type="tel"]').val().length;

            if (name > 3 && phone == 9) {
                $('.form-order-user-data').removeClass('bg-gray-300').addClass('bg-green-400');
                $('.form-order-user-data button').removeClass('bg-green-400 text-white border-green-400').addClass('bg-white text-black border-white');
            }
        })
    </script> -->
    <script>
        $('.hub-block').on('click', function () {
            $('.hub-block').removeClass('border-green-400');
            $(this).addClass('border-green-400');
        });
    </script>
</body>
</html>