<div class="header-bottom-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="header-bottom-wrap">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="logo-area">
                                <a href="{{ route('index') }}">
                                    <img src="/images/logo/logo.png" alt="сервис центр" style="max-height: 50px;">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-9" style="ALIGN-ITEMS: center; display: flex;justify-content: center;">
                            <div class="main-menu">
                                <nav class="main-navigation">
                                    <ul>
                                        <li class="active"><a href="{{ route('index') }}">Главная</a></li>
                                       <!-- <li><a href="{{ route('about') }}">О Нас</a></li> -->
                                        <li><a>Услуги</a>
                                           <ul class="sub-menu">
                                                <li><a href="{{ route('services') }}/repair">Ремонт</a></li>
                                                <li><a href="{{ route('services') }}/engraving">Гравировка клавиатур</a></li>
                                                {{-- <li><a href="{{ route('services') }}/service">Обслуживание</a></li>
                                                <li><a href="{{ route('services') }}/parts">Детали</a></li> --}}
                                            </ul>
                                        </li>
                                        
                                          <li><a href="https://atehno.md/trade-in">TRADE-IN</a></li>
                                        <li><a href="https://atehno.md">Магазин</a>
                                          <!--  <ul class="sub-menu">
                                                <li><a href="https://atehno.md">Главная</a></li>
                                                <li><a href="https://atehno.md/account">Личный кабинет</a></li>
                                                <li><a href="https://atehno.md/spage/contacts-menu">Контакты</a></li>
                                            </ul> -->
                                        </li>
                                        <li><a href="{{ route('contacts') }}">Контакты</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mobile-menu d-block d-lg-none"></div>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>