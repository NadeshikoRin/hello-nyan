<!DOCTYPE NadeshikoRin's html>
<html>
<head>
    <title>BonRegist</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{url('images/favicon.ico')}}">
    <link href="{{ url('css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('materialize/materialize.css') }}" rel="stylesheet" type="text/css">


</head>
<body>
<script type="text/javascript" src="{{ url('js/jquery-3.2.1.min.js') }}"></script>
<script type="text/javascript" src="{{ url('js/materialize.js') }}"></script>
<nav>
    <div class="nav-wrapper">
        <a class="brand-logo"><img src="{{url('images/logo.png')}}" alt="Bon Regist" width="55%"></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="{{url('/BonRegist/home')}}">Home</a></li>
            <li><a href="{{url('/BonRegist/registBon')}}">Regist</a></li>
            <li><a href="{{url('/BonRegist/updateBon')}}">Update</a></li>
            <li><a href="{{url('/BonRegist/logout')}}">Logout</a></li>
        </ul>
    </div>
</nav>


<div class="container">
    @yield('content')
</div>
<br><br><br><br><br><br><br><br><br><br>

</body>

<footer class="page-footer">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text"><img src="{{url('images/logo_min.png')}}" alt="Bon Regist" width="40%"></h5>
                <p class="grey-text text-lighten-4"></p>
            </div>
            <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Navigation</h5>
                <ul>
                    <li><a class="grey-text text-lighten-3" href="{{url('/BonRegist/home')}}">Home</a></li>
                    <li><a class="grey-text text-lighten-3" href="{{url('/BonRegist/registBon')}}">Regist</a></li>
                    <li><a class="grey-text text-lighten-3" href="{{url('/BonRegist/updateBon')}}">Update</a></li>
                    <li><a class="grey-text text-lighten-3" href="{{url('/BonRegist/logout')}}">Logout</a></li>
                    <br><br><br><br><br>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            2018 / NadeshikoRin /
            <a class="grey-text text-lighten-4 right">@naderin_chan</a>
        </div>
    </div>
</footer>
</html>
