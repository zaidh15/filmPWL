	<div class="row">
		<div class="col-md-12">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Film Here</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{ url('/home') }}">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/about') }}">About us</a>
      </li>
      @guest 
      <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}">Login</a>
      </li> 
      <li class="nav-item">
        <a class="nav-link" href="{{ route('register') }}">Register</a>
      </li>
      @else
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Check Film
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          @if(Auth::user()->role != 'anggota')
          <a class="dropdown-item" href="{{ url('/produksi') }}">Produksi</a>
          @endif
          <a class="dropdown-item" href="{{ url('/sutradara') }}">Sutradara</a>
           <a class="dropdown-item" href="{{ url('/film') }}">Film</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          @if(empty(Auth::user()->name))
          {{ '' }}
          @else 
          {{ Auth::user()->name }}
          @endif

        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ url('/produksi') }}">Profile</a>
          @if(Auth::user()->role == 'administrator')
          <a class="dropdown-item" href="{{ url('/users') }}">Kelola User</a>
          @endif
          <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
        </div>
      </li>
      @endguest
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

		</div>
	</div>