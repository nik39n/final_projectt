<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Shop</title>

    <!-- Favicon  -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="icon" href="{{asset('img/core-img/favicon.ico')}}">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="{{asset('css/core-style.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/classy-nav.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">



    <script src="{{ asset('js/app.js') }}"></script>


    




</head>

<body>
    
    <!-- ##### Header Area Start ##### -->
    <header class="header_area  ">
        <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between" style="padding-right: 20px;">
            <!-- Classy Menu -->
            <nav class="classy-navbar" id="essenceNav">
                <!-- Logo -->
                <a class="nav-brand" href="{{route('index')}}"><img src="{{ asset('img/core-img/logo.png')}}" alt=""></a>
                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>
                <!-- Menu -->
                <div class="classy-menu ">
                    <!-- close btn -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>
                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>
                            <li><a href="{{route('catalog.allprod')}}">Магазин</a></li>
                            <li><a href="{{route('catalog.index')}}">Категории</a></li>
                            <li><a href="{{route('catalog.allbrand')}}">Бренды</a></li>
                        </ul>
                    </div>
                    <!-- Nav End -->
                </div>
            </nav>

            <!-- Header Meta Data -->
            <div class="header-meta d-flex clearfix justify-content-end">
                <!-- Search Area -->
                <div class="search-area  ">
                    <form action="{{route('search.index')}}" method="GET">
                        <input type="search" name="search" id="headerSearch" placeholder="Поле поиска">
                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div>

                <!-- User Login Info -->
                @guest
                    <div class="user-login-info">
                        <a href="{{route('login')}}"><img src="{{ asset('img/core-img/user.svg')}}" alt=""></a>
                    </div>
                @endguest
                @auth 
                    @if(Auth::user()->isAdmin())
                        <div class="user-login-info ">
                            <a href="{{route('home')}}"><img src="{{ asset('img/core-img/user.svg')}}" alt=""></a>
                        </div>
                    @else
                    <div class="user-login-info ">
                            <a href="{{route('person.orders.index')}}"><img src="{{ asset('img/core-img/user.svg')}}" alt=""></a>
                        </div>
                    @endif
                    <div class="user-login-info logout ">
                        <a href="{{route('get-logout')}}" class="logout" style="    display: flex;align-items: center; justify-content: center;" ><i class="fas fa-sign-out-alt" style="font-size:20px;"></i></a>
                    </div>
                @endauth
                <!-- Cart Area -->
                <div class="cart-area" >
                    <a href="{{route('basket')}}" id="essenceCartBtn"><img src="{{ asset('img/core-img/bag.svg')}}" alt="">
                    @isset($count)
                        <span>{{$count}}</span>
                    @else
                        <span></span>
                    @endisset
                </a>
                </div>
            </div>

        </div>
        @if(session()->flash('warning', 'У вас нет прав администратора'))
        <h3 style="color:green"> user has been added</h3>
        @endif
    </header>
    <!-- ##### Header Area End ##### -->
        <div id="preloader">
                <img src="{{asset('img/core-img/loader.gif')}}" alt="preloader">
        </div>
         @yield('content')        
        
    <!-- ##### Footer Area Start ##### -->
    <footer class="footer_area clearfix col-sm-12 p-0">
        <div class="container">
            <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between" style=" background-color: #252525;">
                <!-- Classy Menu -->
                <nav class="classy-navbar d-flex justify-content-between " id="essenceNav">
                    <!-- Logo -->
                    <a class="nav-brand col-sm-6" href="{{route('index')}}"><img src="{{ asset('img/core-img/logo2.png')}}" alt="" style="width: 100;text-align: center;"></a>
                    <!-- Navbar Toggler -->
                    
                    <!-- Menu -->
                        <!-- close btn -->
                        
                        <!-- Nav Start -->
                            <ul  class="col-sm-6 ul-stylee">
                                <li><a href="{{route('catalog.allprod')}}" style="color:white;">Магазин</a></li>
                                <li><a href="{{route('catalog.index')}}" style="color:white;">Категории</a></li>
                                <li><a href="{{route('catalog.allbrand')}}" style="color: white;">Бренды</a></li>
                            </ul>
                            <style>
                                .ul-stylee{
                                    display:flex;
                                    align-items:center;
                                    flex-direction:row;
                                    justify-content: space-between;
                                }
                                @media only screen and (max-width:567px) {
                                    .ul-stylee{
                                        display: flex;
                                        justify-content: space-between;
                                        align-items: center;
                                        flex-wrap: nowrap;
                                        flex-direction: column;
                                    }
                                }
                            </style>
                        </div>
                        <!-- Nav End -->
                </nav>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->


    <script src="{{ asset('js/site.js') }}"></script>
    <script>window.onload = function() {
            let preloader = document.getElementById('preloader');
            preloader.classList.add('hide-preloader');
            setInterval(function() {
                preloader.classList.add('preloader-hidden');
            }, 990);}</script>

</body>

</html>