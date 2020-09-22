<aside class="menu-sidebar d-none d-lg-block" style="font-size:10px">
    <div class="logo card" >
        <a href="{{route('home')}}" >
            <img src="{{asset('font-assets/images/logo.png')}}" alt="otiv" width="100" height="40"/>
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar card">
            <ul class="list-unstyled navbar__list">
                <li class="has-sub">
                    <a class="js-arrow" href="{{route('home')}}"><i class="fa fa-tachometer-alt"></i>Dashboard</a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#"><i class="fa fa-plus"></i>Ajouter</a>
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
                    <a class="js-arrow" href="{{url('/liste-preparation')}}"><i class="fa fa-check"></i>
                        Preparation Colis</a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="{{url('/liste-mouvement')}}"><i class="fa fa-send"></i>
                        Envoyer Colis</a>
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
        </nav>
    </div>
</aside>
