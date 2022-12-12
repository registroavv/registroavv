<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('img/sidebar-1.jpg') }}">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href=" {{ route('home') }} " class="simple-text logo-normal">
      <img style="width:150px" src="{{ asset('img/logocenso.png') }}">
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      @if (auth()->user()->rol_id <> '5')
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i><img style="width:25px" src="{{ asset('img/dashboard.png') }}"></i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
      @endif
        {{-- <li class="nav-item{{ $activePage == 'obervaciones' ? ' active' : '' }}">
          <a class="nav-link" href="{{ route('avv.observaciones') }}">
            <i><img style="width:25px" src="{{ asset('img/tomar_nota.png') }}"></i>
              <p>{{ __('OBSERVACIONES') }}</p>
          </a>
        </li>         --}}
      @if (auth()->user()->rol_id == '1')
        <li class="nav-item {{ $activePage == 'profile' ? ' active' : '' }}">
          <a class="nav-link" href="{{ route('user.index') }}">
            <i><img style="width:25px" src="{{ asset('img/user2.svg') }}"></i>
            <p>{{ __('Manejo de Usuarios') }}</p>
          </a>
        </li>
        <li class="nav-item{{ $activePage == 'Saime' ? ' active' : '' }}">
          <a class="nav-link" href="{{ route('saime.index') }}">
            <i><img style="width:25px" src="{{ asset('img/basedatos.png') }}"></i>
              <p>{{ __('Data Saime') }}</p>
          </a>
        </li>
      @endif
        <li class="nav-item{{ $activePage == 'avv' ? ' active' : '' }}">
          <a class="nav-link" href="{{ route('avv.index') }}">
            <i><img style="width:25px" src="{{ asset('img/registro.png') }}"></i>
              <p>{{ __('Registro AVV') }}</p>
          </a>
        </li>
      @if (auth()->user()->estado_id == '25' && auth()->user()->rol_id <> '5')
        <li class="nav-item{{ $activePage == 'map' ? ' active' : '' }}">
          <a class="nav-link" href="{{ route('avv.maps')}}">
            <i><img style="width:25px" src="{{ asset('img/map.png') }}"></i>
              <p>{{ __('Mapa') }}</p>
          </a>
        </li>
      @endif
      <li class="nav-item {{ $activePage == 'Salir' ? ' active' : '' }}">
        <a class="nav-link text-white bg-danger" href="{{ Route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Salir') }}
          <i class="material-icons text-white">logout</i>
        </a>

        {{-- <a class="nav-link text-white bg-danger" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Salir') }}</a> --}}
      </li>
    </ul>
  </div>
</div>
