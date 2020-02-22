<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 bg-white border-bottom shadow-sm">
      <h5 class="my-0 mr-md-auto font-weight-normal">
        <a href="{{ url('/') }}">
            Asika prod
        </a>
      </h5>
    @auth
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark" href="{{ route('home.index') }}">Просмотреть активы</a>
            <a class="p-2 text-dark" href="{{ route('home.create') }}">
                Добавить объект
                <span class="badge badge-success badge-pill">14</span>
            </a>
            <a class="p-2 text-dark" href="#">qrCode</a>
            <a class="p-2 text-dark" href="#">Pricing</a>
        </nav>
    @endauth
    @if (Route::has('login'))
        @auth
                <a id="navbarDropdown" class="btn btn-outline-success dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="
                            event.preventDefault();
                            document.getElementById('logout-form').submit();
                            ">
                        Выйти
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
        @else
            <a class="btn btn-outline-primary" href="{{ route('login') }}">Войти</a>
        @endauth
    @endif
</div>