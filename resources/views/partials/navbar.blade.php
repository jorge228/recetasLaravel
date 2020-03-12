<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <a class="navbar-brand" href="{{url('recipe')}}" style="color:#777">
        <img src="{{asset('images\icono2.png')}}" width="45" height="45">
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>


    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item {{ Request::is('recipe') && ! Request::is('recipe/create')? 'active' : ''}}">
                <a class="nav-link" href="{{url('/recipe')}}">
                    <span class="glyphicon glyphicon-film" aria-hidden="true"></span>
                    Recetas
                </a>
            </li>
            <li class="nav-item {{  Request::is('recipe/create') ? 'active' : ''}}">
                <a class="nav-link" href="{{url('/recipe/create')}}">
                    <span>&#10010</span> Nueva receta
                </a>
            </li>
        </ul>
        @guest

                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>

            @if (Route::has('register'))

                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>

            @endif
        @else

                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{method_field('PUT')}}
                        @csrf
                    </form>
                </div>

        @endguest
    </div>

</nav>
