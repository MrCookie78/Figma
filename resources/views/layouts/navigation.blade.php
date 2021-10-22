<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin-bottom: 20px;">
    <a class="navbar-brand" style="padding-left: 20px;" href="#">Figma</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">

             <li class="nav-item">
                <a class="nav-link {{ $currentPage === "Formations" ? "active" : "" }}" href="">Formations</a>
            </li>
            {{--
            <li class="nav-item">
                <a class="nav-link {{ $currentPage === "categories" ? "active" : "" }}" href="{{ route("categories-list") }}">Catégories</a>
            </li>
            @if (\Illuminate\Support\Facades\Auth::check())
                <li class="nav-item nav-link">{{ \Illuminate\Support\Facades\Auth::user()->firstname }}</li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-danger">Déconnexion</button>
                    </form>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link {{ $currentPage === "login" ? "active" : "" }}" href="{{ route('login') }}">Connexion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $currentPage === "register" ? "active" : "" }}" href="{{ route('register') }}">Inscription</a>
                </li>
            @endif
            <li class="nav-item">
                <a class="nav-link {{ $currentPage === "contacts" ? "active" : "" }}" href="{{ route('contact') }}">Contact</a>
            </li> --}}
        </ul>
    </div>
</nav>
