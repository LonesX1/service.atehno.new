@include('components.head')

<body>
    <div class="main-wrapper">
        @include('components.header')
        @yield('content')
    </div>

    @include('components.footer')
</body>