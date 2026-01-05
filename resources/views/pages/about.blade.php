@extends('layouts.app')

@section('title', 'Tentang Kami - TS Luxury')

@section('content')
<style>
    :root {
        --luxury-black: #0f0f0f;
        --luxury-dark: #1a1a1a;
        --luxury-gold: #d4af37;
        --luxury-gold-gradient: linear-gradient(45deg, #bf953f, #fcf6ba, #b38728, #fbf5b7, #aa771c);
    }
    
    body { background-color: var(--luxury-black); color: #e0e0e0; font-family: 'Times New Roman', serif; }
    .font-sans { font-family: system-ui, -apple-system, sans-serif; }
    
    .text-gold { color: var(--luxury-gold); }
    .gold-gradient-text {
        background: var(--luxury-gold-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        font-weight: bold;
    }

    .about-header {
        padding: 80px 0;
        background: radial-gradient(circle at center, #222 0%, #0f0f0f 100%);
        text-align: center;
    }

    .img-frame {
        position: relative;
        padding: 10px;
        border: 1px solid #333;
        background: #000;
    }
    
    .img-frame::after {
        content: '';
        position: absolute;
        top: 20px; left: 20px; bottom: -20px; right: -20px;
        border: 1px solid var(--luxury-gold);
        z-index: -1;
    }

    .img-about {
        width: 100%;
        height: auto;
        filter: grayscale(20%) contrast(110%);
        display: block;
    }

    .stat-card {
        background: var(--luxury-dark);
        padding: 30px;
        border: 1px solid #333;
        text-align: center;
        transition: 0.3s;
    }
    .stat-card:hover { border-color: var(--luxury-gold); transform: translateY(-5px); }
    .stat-number { font-size: 3rem; font-weight: bold; color: var(--luxury-gold); }

    .signature {
        font-family: 'Cursive', serif;
        font-size: 2rem;
        color: #888;
        margin-top: 20px;
    }
</style>

<div class="about-header">
    <div class="container">
        <h6 class="text-gold text-uppercase font-sans letter-spacing-2">The Story</h6>
        <h1 class="display-3 fw-bold gold-gradient-text">Heritage & Craftsmanship</h1>
    </div>
</div>

<div class="container py-5">
    <div class="row align-items-center mb-5">
        <div class="col-lg-6 mb-5 mb-lg-0 pe-lg-5">
            <h2 class="text-white mb-4 display-6">Mendefinisikan Ulang Kemewahan Sejak 2024</h2>
            <div class="divider-gold bg-warning" style="height: 2px; width: 60px; margin-bottom: 2rem;"></div>
            <p class="font-sans text-secondary lh-lg mb-4">
                TS Luxury lahir dari keinginan untuk menghadirkan keanggunan abadi dalam setiap detil kehidupan. Kami bukan sekadar toko, melainkan kurator gaya hidup bagi mereka yang menghargai kualitas tanpa kompromi.
            </p>
            <p class="font-sans text-secondary lh-lg">
                Setiap produk dalam katalog kami dipilih melalui proses kurasi yang ketat, memastikan otentisitas dan eksklusivitas. Kami percaya bahwa kemewahan sejati terletak pada cerita di balik setiap jahitan dan kilau materialnya.
            </p>
            <div class="signature">TS Luxury Team</div>
        </div>
        <div class="col-lg-6">
            <div class="img-frame">
                <img src="{{ asset('assets/images/lux_005.jpg') }}" alt="Our Boutique" class="img-about">
            </div>
        </div>
    </div>

    <div class="row g-4 mt-5 font-sans">
        <div class="col-md-4">
            <div class="stat-card">
                <div class="stat-number">100%</div>
                <div class="text-white text-uppercase mt-2">Authentic Goods</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card">
                <div class="stat-number">50+</div>
                <div class="text-white text-uppercase mt-2">Exclusive Brands</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card">
                <div class="stat-number">24/7</div>
                <div class="text-white text-uppercase mt-2">VIP Support</div>
            </div>
        </div>
    </div>
</div>
@endsection