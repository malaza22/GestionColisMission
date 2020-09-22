@extends('layouts.app')

@section('principale')
<!-- HEADER MOBILE-->
<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class=" header-mobile-inner">
                <div class="logo">
                    <a href="{{route('home')}}">
                        <img src="{{asset('font-assets/images/logo.png')}}" alt="otiv" width="70" height="40" />
                    </a>
                </div>
                <button class="hamburger hamburger--slider" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
                <li class="has-sub">
                    <a class="js-arrow" href="{{route('home')}}"><i class="fa fa-tachometer-alt"></i>Dashboard</a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fa fa-list-alt"></i>Listes</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li class="has-sub">
                            <a class="js-arrow" href="{{url('/list-agency')}}"><i
                                    class="far fa-check-square"></i>Agence</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="{{url('/list-service')}}"><i
                                    class="far fa-check-square"></i>Service</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="{{url('/list-job')}}"><i
                                    class="far fa-check-square"></i>Proffession</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="{{url('/list-personal')}}"><i
                                    class="far fa-check-square"></i>Personnel</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="{{url('/list-product')}}"><i
                                    class="far fa-check-square"></i>Produit</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="{{url('/list-packaging')}}"><i
                                    class="far fa-check-square"></i>Amballage</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="{{url('/liste-preparation')}}"><i class="fa fa-check"></i>Preparation
                        Colis</a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="{{url('/liste-mouvement')}}"><i class="fa fa-send"></i>Envoyer Colis</a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#"><i class="fa fa-list-alt"></i>Liste</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li class="has-sub">
                            <a class="js-arrow" href="{{url('/liste-envoyer')}}"><i
                                    class="far fa-check-square"></i>Envoyer</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="{{url('/liste-reçue')}}"><i class="fa fa-check"></i>Reçue</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- END HEADER MOBILE-->

<!-- MENU SIDEBAR-->
@include('layouts.aside')
<!-- END MENU SIDEBAR-->

<!-- PAGE CONTAINER-->
<div class="page-container">
    <!-- HEADER DESKTOP-->
    <header class="header-desktop" style="background-color: #62a274">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="header-wrap">
                    <label class="form-header au-input au-input--lg ">
                        Nous somme le {{date('d/m/Y')}}
                    </label>
                    <div class="header-button">
                        <div class="noti-wrap">
                            <div class="noti__item">
                                {{-- <a href="">
                                    <i class="zmdi zmdi-notifications"><span class="quantity">0</span></i>
                                </a> --}}
                            </div>
                        </div>
                        <div class="account-wrap">
                            <div class="account-item clearfix js-item-menu">
                                <div class="image ">
                                    {{-- <img src="{{asset('font-assets/images/icon/avatar-01.jpg')}}" alt="photo de profile"
                                        style="width:200px;border-radius: 50%;" /> --}}
                                    <img src="{{asset('font-assets/images/logo.png')}}" alt="otiv" width="40" height="18" style="border-radius: 50%;" />/>
                                </div>
                                <div class="content">
                                    <a class="js-acc-btn" href="#">{{Auth()->user()->name}}</a>
                                </div>
                                <div class="account-dropdown js-dropdown">
                                    <div class="info clearfix">
                                        <div class="image">
                                            <a href="#">

                                                <img src="{{asset('font-assets/images/icon/avatar-01.jpg')}}"
                                                    alt="photo de profile" style="width:200px;border-radius: 50%;" />
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h5 class="name">
                                                <a href="#">{{Auth()->user()->name}}</a>
                                            </h5>
                                            <span class="email">{{Auth()->user()->email}}</span>
                                            <br>
                                            <span class="email">{{Auth()->user()->agencies->name}}</span>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="{{url('/view-user')}}">
                                                <i class="zmdi zmdi-account"></i>Account</a>
                                        </div>
                                        {{-- <div class="account-dropdown__item">
                                            <a href="{{url('/update-user')}}">
                                                <i class="zmdi zmdi-settings"></i>Setting</a>
                                        </div> --}}
                                    </div>
                                    <div class="account-dropdown__footer">
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                            <i class="zmdi zmdi-power"></i>Logout</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- MAIN CONTENT-->
    {{-- <div class="main-content" style=" background-image: url('font-assets/images/bg-title-03.jpg');"> --}}
    <div class="main-content">
        @yield('content')
    </div>
    @include('layouts.footer')
    <!-- END PAGE CONTAINER-->
</div>
@endsection
