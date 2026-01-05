<header>
    <nav class="navbar navbar-expand-lg navbar-dark py-3" style="background: linear-gradient(90deg,#070707, #111);">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                <img src="{{ asset('assets/images/logo_toko.png') }}" alt="TS Luxury" style="height:46px; object-fit:contain; filter: drop-shadow(0 2px 4px rgba(0,0,0,.6));">
                <span class="ms-2 fw-bold text-gold">TS LUXURY</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item"><a class="nav-link text-white" href="{{ url('/') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="{{ url('/about') }}">About</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="{{ route('katalog.index') }}">Katalog</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="{{ url('/contact') }}">Contact</a></li>
                    
                    <li class="nav-item ms-3 d-none d-lg-block">
                        <a class="btn btn-gold btn-sm px-4 fw-bold" href="{{ route('katalog.index') }}">Shop</a>
                    </li>

                    @php $cartCount = count(session('cart', [])); @endphp
                    <li class="nav-item ms-2">
                        <a class="nav-link position-relative text-white" href="{{ route('keranjang.index') }}" title="Keranjang">
                            <i class="bi bi-cart3 fs-5"></i>
                            @if($cartCount > 0)
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-gold text-dark" style="font-size:0.7rem;">{{ $cartCount }}</span>
                            @endif
                        </a>
                    </li>

                    <li class="nav-item ms-3">
                        @guest
                            <a href="{{ route('login') }}" class="nav-link text-white"><i class="bi bi-person-circle"></i> Login</a>
                        @else
                            <div class="dropdown">
                                <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-person-check-fill text-gold"></i> {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end">
                                    <li><a class="dropdown-item" href="{{ route('admin.katalog.index') }}">Dashboard Admin</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="dropdown-item text-danger">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @endguest
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>