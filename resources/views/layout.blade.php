<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <!-- Title Até 70 caracteres -->
    <title>Frangão</title>
    <!-- Description Até 140 caracteres -->
    <meta name="description" content="">
    <!-- Favicon -->
    <link rel="icon" href="/img/favicon.ico" type="image/ico" sizes="16x16">
    <!-- Crhome Mobile Color and Icon High Res -->
    <meta name="theme-color" content="#000000">
    <link rel="icon" sizes="192x192" href="/img/icon-highres.png">
    <!-- Metadados -->
    <meta property="og:type" content="website"/>
    <meta property="og:title" content=""/>
    <meta property="og:description" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:image" content=""/><!-- 300px x300px -->
    <meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1.0'">

    <!--<link rel="shortcut icon" href="favicon.ico">-->
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/grid.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/animate.css">

    <!-- Script Fonts Awesome -->

    <script src="https://use.fontawesome.com/2bf8de3ac4.js"></script>

</head>
<body><div class="overflow">
    <header>
        <div class="container">
            <div class="logo f"></div>
            <div class="logo rango"></div>
            <div class="logo frango"></div>
            @if(Auth::check())
                <div class="logout">
                <a href="{{ url('/') }}"><h2>Visualizar</h2></a>
                <a href="{{ url('/admin') }}"><h2>Editar</h2></a>
                <a href="{{ url('/logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><h2>Logout</h2></a>
                </div>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            @endif
            <div class="telefone-header"><a href="#"><h2><sup>(18)</sup> 88888-8888 <i class="fa fa-whatsapp" aria-hidden="true"></i></h2></a></div>
        </div>
    </header>
    <div class="introducao">
        <div class="dodge wow bounce-carro" data-wow-delay="100ms" id="dodge">
        </div>
    </div>
@yield('content')
    <footer>
        <div class="carropreto"></div>
        <div class="footer">
            <div style="padding-top: 50px;"></div>
            <div class="container">
                <div class="grid-4 gridfooter">
                    <i class="fa fa-map-marker fa-fw" aria-hidden="true"></i>
                    <p>Presidente<br /><span><strong>Prudente</strong> - SP</span></p>
                </div>
                <div class="grid-6 gridfooter">
                    <i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>
                    <p>Atendimento<br /><span><strong>QUA</strong> <span style="text-transform: lowercase;">a</span> <strong>DOM</strong> <span style="text-transform: lowercase;">das </span><strong>18<sup>:00</sup> </strong><span style="text-transform: lowercase;">às</span> <strong>0<sup>:30</sup></strong></span></p>
                </div>
                <div class="grid-6 gridfooter">
                    <i class="fa fa-motorcycle fa-fw" aria-hidden="true" style="margin-right: 20px;"></i>
                    <p>Taxa de entrega<br /><span><strong>R$3<sup>,00</sup></strong></span> <span id="aviso" style="text-transform: lowercase;">Por entrega.</span></p>
                </div>
            </div>
        </div>
</div>
</footer>

<!-- JavaScript -->
<script src="/js/libs/jquery-3.1.0.min.js"></script>
<script src="/js/plugins.js"></script>
<script src="/js/main.js"></script>
<script src="/js/libs/wow.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script>
    new WOW().init();
</script>
<!-- JavaScript -->
</div></body>
</html>