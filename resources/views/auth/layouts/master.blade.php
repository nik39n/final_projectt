<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Админка: @yield('title')</title>

    <!-- Favicon  -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="icon" href="{{asset('img/core-img/favicon.ico')}}">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/classy-nav.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">





    <script src="{{ asset('js/app.js') }}"></script>


<body style="
    margin-top: 0px;
">
<div id="app">
<nav class="classy-navbar navbar-default navbar-expand-md navbar-light bg-light navbar-laravel d-flex align-items-center justify-content-between" id="essenceNav">
            <a class="navbar-brand" href="{{ route('index') }}">
                Вернуться на сайт
            </a>

            <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>
                <!-- Menu -->
                <div class="classy-menu ">
                    <!-- close btn -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>
                    <div class="classynav">
                        <ul class="nav navbar-nav mr-auto mt-2 mt-lg-0" style="width: 100%;">
                            @admin
                                <li><a href="{{route('categories.index')}}" class="nav-link">Категории</a></li>
                                <li><a href="{{route('products.index')}}"  class="nav-link">Товары</a>
                                <li><a href="{{route('brands.index')}}"  class="nav-link">Бренды</a>
                                <li><a href="{{route('home')}}"class="nav-link">Заказы</a></li>
                            @endadmin
                        
                
                            @guest
                                    <li class="nav-item">
                                        <a class="nav-link active" href="{{ route('login') }}">Войти</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="{{ route('register') }}">Зарегистрироваться</a>
                                    </li>
                            @endguest

                            @auth
                                    <li class="nav-item dropdown">
                                        @admin
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                            data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false" v-pre>
                                                    Администратор
                                            </a>
                                        @else 
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                            data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false" v-pre>
                                                    Аккаунт 
                                            </a>
                                        @endadmin
                                        
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout')}}"
                                            onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                Выйти
                                            </a>

                                            <form id="logout-form" action="{{ route('logout')}}" method="POST"
                                                style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                        @endauth
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="py-4">
        <div class="container">
                @yield('content')
        </div>
    </div>
</div>
    <script src="{{ asset('js/site.js') }}"></script>

</body>
</html>