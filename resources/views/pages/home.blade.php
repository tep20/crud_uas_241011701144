@extends('layouts.app')

@section('title', 'Home - TS Luxury')

@section('content')
<style>
    /* --- LUXURY THEME CSS --- */
    :root {
        --luxury-black: #0f0f0f;
        --luxury-dark: #1a1a1a;
        --luxury-gold: #d4af37;
        --luxury-gold-light: #f3e5ab;
        --luxury-gold-gradient: linear-gradient(45deg, #bf953f, #fcf6ba, #b38728, #fbf5b7, #aa771c);
    }

    body {
        background-color: var(--luxury-black);
        color: #f8f9fa;
        font-family: 'Times New Roman', serif; /* Serif memberikan kesan elegan */
    }

    /* Typography */
    .font-sans { font-family: system-ui, -apple-system, sans-serif; }
    .text-gold { color: var(--luxury-gold); }
    
    .gold-gradient-text {
        background: var(--luxury-gold-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 2px;
    }

    /* Hero Section */
    .hero-section {
        position: relative;
        height: 100vh;
        min-height: 600px;
        background: url('{{ asset("assets/images/lux_001.jpg") }}') no-repeat center center/cover;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .hero-overlay {
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        background: linear-gradient(to bottom, rgba(0,0,0,0.3), rgba(15,15,15,1));
        z-index: 1;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        text-align: center;
        animation: fadeInUp 1.5s ease-out;
    }

    /* Buttons */
    .btn-gold {
        background: var(--luxury-gold-gradient);
        color: #000;
        border: none;
        padding: 12px 35px;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 1px;
        border-radius: 50px; /* Pill shape */
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        text-decoration: none;
        display: inline-block;
    }

    .btn-gold:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(212, 175, 55, 0.3);
        color: #000;
    }

    .btn-outline-gold {
        border: 1px solid var(--luxury-gold);
        color: var(--luxury-gold);
        padding: 10px 30px;
        border-radius: 50px;
        text-decoration: none;
        transition: all 0.3s;
    }

    .btn-outline-gold:hover {
        background-color: var(--luxury-gold);
        color: #000;
    }

    /* Features Section */
    .feature-card {
        background: rgba(26, 26, 26, 0.8);
        border: 1px solid #333;
        padding: 2rem;
        border-radius: 0; /* Kotak tegas lebih elegan */
        transition: all 0.4s ease;
        height: 100%;
    }

    .feature-card:hover {
        border-color: var(--luxury-gold);
        transform: translateY(-5px);
    }

    .feature-icon {
        font-size: 2.5rem;
        background: var(--luxury-gold-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 1rem;
    }

    /* Product Showcase */
    .product-showcase-img {
        width: 100%;
        height: 350px;
        object-fit: cover;
        transition: transform 0.5s ease;
        filter: brightness(0.8);
    }

    .product-card {
        overflow: hidden;
        position: relative;
        cursor: pointer;
    }

    .product-card:hover .product-showcase-img {
        transform: scale(1.05);
        filter: brightness(1);
    }

    .product-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        padding: 20px;
        background: linear-gradient(to top, rgba(0,0,0,0.9), transparent);
        opacity: 1;
        transition: opacity 0.3s;
    }

    /* Animations */
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Helper */
    .divider-gold {
        height: 2px;
        width: 80px;
        background: var(--luxury-gold);
        margin: 20px auto;
    }
</style>

<div class="hero-section">
    <div class="hero-overlay"></div>
    <div class="hero-content container">
        <h5 class="text-uppercase letter-spacing-2 text-white mb-3 font-sans" style="letter-spacing: 4px; opacity: 0.8;">Welcome to TS Luxury</h5>
        <h1 class="display-1 fw-bold mb-4 gold-gradient-text">Timeless Elegance</h1>
        <p class="lead text-light mb-5 mx-auto font-sans" style="max-width: 600px; opacity: 0.9;">
            Temukan koleksi barang mewah terbaik yang mendefinisikan status dan gaya Anda. Kualitas tanpa kompromi untuk pribadi yang istimewa.
        </p>
        <div class="d-flex justify-content-center gap-3">
            <a href="{{ route('katalog.index') }}" class="btn-gold shadow-lg">Belanja Sekarang</a>
            <a href="{{ url('/about') }}" class="btn-outline-gold">Tentang Kami</a>
        </div>
    </div>
</div>

<div class="container py-5" style="margin-top: -50px; position: relative; z-index: 10;">
    <div class="row g-4">
        <div class="col-md-4">
            <div class="feature-card text-center">
                <div class="feature-icon"><i class="bi bi-gem"></i></div>
                <h4 class="text-gold font-serif mb-2">100% Authentic</h4>
                <p class="text-muted font-sans small">Jaminan keaslian produk. Setiap detail diperiksa oleh ahli kami.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="feature-card text-center">
                <div class="feature-icon"><i class="bi bi-shield-lock"></i></div>
                <h4 class="text-gold font-serif mb-2">Secure Payment</h4>
                <p class="text-muted font-sans small">Transaksi aman dan terenkripsi. Privasi Anda adalah prioritas utama kami.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="feature-card text-center">
                <div class="feature-icon"><i class="bi bi-airplane-engines"></i></div>
                <h4 class="text-gold font-serif mb-2">Global Shipping</h4>
                <p class="text-muted font-sans small">Pengiriman berasuransi ke seluruh wilayah dengan penanganan VIP.</p>
            </div>
        </div>
    </div>
</div>

<div class="container py-5 mb-5">
    <div class="text-center mb-5">
        <h6 class="text-gold text-uppercase font-sans" style="letter-spacing: 3px;">Koleksi Terbaru</h6>
        <h2 class="display-5 text-white fw-bold">New Arrivals</h2>
        <div class="divider-gold"></div>
    </div>

    <div class="row g-0">
        <div class="col-md-4">
            <div class="product-card">
                <img src="{{ asset('assets/images/lux_002.jpg') }}" alt="Luxury Item" class="product-showcase-img">
                <div class="product-overlay">
                    <h5 class="text-white mb-0 font-serif">Royal Collection</h5>
                    <a href="{{ route('katalog.index') }}" class="text-gold text-decoration-none small font-sans text-uppercase mt-2 d-inline-block">Lihat Detail <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="product-card">
                <img src="{{ asset('assets/images/lux_003.jpg') }}" alt="Luxury Item" class="product-showcase-img">
                <div class="product-overlay">
                    <h5 class="text-white mb-0 font-serif">Executive Series</h5>
                    <a href="{{ route('katalog.index') }}" class="text-gold text-decoration-none small font-sans text-uppercase mt-2 d-inline-block">Lihat Detail <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="product-card">
                <img src="{{ asset('assets/images/lux_004.jpg') }}" alt="Luxury Item" class="product-showcase-img">
                <div class="product-overlay">
                    <h5 class="text-white mb-0 font-serif">Limited Edition</h5>
                    <a href="{{ route('katalog.index') }}" class="text-gold text-decoration-none small font-sans text-uppercase mt-2 d-inline-block">Lihat Detail <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid py-5 bg-black border-top border-secondary">
    <div class="container py-4 text-center">
        <h2 class="text-white mb-3 font-serif">Bergabunglah dengan Eksklusivitas</h2>
        <p class="text-muted font-sans mb-4">Dapatkan akses awal ke koleksi terbaru dan penawaran khusus member.</p>
        @guest
            <a href="{{ route('register') }}" class="btn-gold px-5">Daftar Member VIP</a>
        @else
            <a href="{{ route('katalog.index') }}" class="btn-gold px-5">Lihat Katalog Penuh</a>
        @endguest
    </div>
</div>
@endsection