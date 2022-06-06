
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a href="{{url('/')}}"><img style="margin-top: -1rem!important;" class="mr-5" width="60px"  src="admin/assets/images/logo-mini.svg" alt="logo" /></a>
            <a class="navbar-brand ml-5" href="{{url('/')}}"><h2>Boucherie du <em>Marché</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="{{url('/')}}">Accueil
                  <span class="sr-only">(current)</span>
                </a>
              </li>

              <li class="nav-item ">
                <a class="nav-link" href="{{url('/shop')}}">Produits
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="{{url('/recipesWelcome')}}">Recettes</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="{{url('/nous')}}">Nous</a>
              </li>

    <form style="display: none" action='/search' method='GET'>
        <div class="d-flex flex-row">
                <input style="height: 20%" id='q' type='text' name='q' placeholder='Rechercher' role='search' value='{{ $q ?? null }}'>
                <button type='submit'>
                    <img width="60%" class="ml-2" src='/images/iconSearch.svg'>
                </button>
            </div>
            </form>
              @if (Route::has('login'))
              <li class="nav-item">
                  @auth

                  <li class="nav-item">
                    <a class="nav-link d-flex flex-row" href="{{url('showcart')}}"><i class="fa fa-shopping-cart mr-1 mt-1" aria-hidden="true"></i>[{{$count}}]
                    </a>
                  </li>

                        <x-app-layout>

                        </x-app-layout>


                  @else
                      <a href="{{ route('login') }}" class="nav-link" >Connexion</a>
                    </li>

                      @if (Route::has('register'))
                      <li class="nav-item">
                          <a href="{{ route('register') }}"class="nav-link" >Inscription</a>
                        </li>
                      @endif
                  @endauth
                @endif
            </ul>
          </div>
        </div>
      </nav>
    </header>
