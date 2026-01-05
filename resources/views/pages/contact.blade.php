@extends('layouts.app')

@section('title', 'Hubungi Kami - TS Luxury')

@section('content')
<style>
    :root {
        --luxury-black: #0f0f0f;
        --luxury-dark: #1a1a1a;
        --luxury-gold: #d4af37;
    }
    body { background-color: var(--luxury-black); color: #f8f9fa; font-family: 'Times New Roman', serif; }
    .font-sans { font-family: system-ui, -apple-system, sans-serif; }

    /* Custom Input Dark Theme */
    .form-control, .form-select {
        background-color: var(--luxury-dark);
        border: 1px solid #333;
        color: #fff;
        border-radius: 0; /* Kotak tajam lebih elegan */
        padding: 12px 15px;
    }
    .form-control:focus {
        background-color: var(--luxury-dark);
        border-color: var(--luxury-gold);
        color: #fff;
        box-shadow: 0 0 0 0.2rem rgba(212, 175, 55, 0.25);
    }
    .form-label { color: #aaa; font-family: system-ui; font-size: 0.9rem; }

    .btn-gold {
        background: linear-gradient(45deg, #b38728, #fbf5b7, #aa771c);
        color: #000;
        border: none;
        padding: 12px 40px;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: 0.3s;
        border-radius: 0;
    }
    .btn-gold:hover { transform: translateY(-2px); box-shadow: 0 5px 15px rgba(212, 175, 55, 0.3); color: #000; }

    .contact-info-box {
        background: var(--luxury-dark);
        padding: 40px;
        border: 1px solid #333;
        height: 100%;
    }
    .icon-gold {
        font-size: 2rem;
        color: var(--luxury-gold);
        margin-bottom: 15px;
        display: block;
    }
</style>

<div class="container py-5">
    <div class="row justify-content-center mb-5">
        <div class="col-lg-8 text-center">
            <h6 class="text-warning text-uppercase font-sans" style="letter-spacing: 3px;">Concierge Service</h6>
            <h1 class="display-4 fw-bold text-white mb-3">Hubungi Kami</h1>
            <p class="text-secondary font-sans">Tim concierge kami siap membantu Anda dengan pertanyaan seputar produk, pemesanan khusus, atau layanan purna jual.</p>
        </div>
    </div>

    <div class="row g-5">
        <div class="col-lg-7">
            <form action="#" class="font-sans">
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="name" placeholder="Nama Anda">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="email" class="form-label">Alamat Email</label>
                            <input type="email" class="form-control" id="email" placeholder="email@contoh.com">
                        </div>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="subject" class="form-label">Subjek</label>
                    <input type="text" class="form-control" id="subject" placeholder="Perihal pesan Anda">
                </div>

                <div class="mb-4">
                    <label for="message" class="form-label">Pesan</label>
                    <textarea class="form-control" id="message" rows="5" placeholder="Tuliskan pesan Anda di sini..."></textarea>
                </div>

                <button type="button" class="btn btn-gold w-100">Kirim Pesan</button>
            </form>
        </div>

        <div class="col-lg-5 font-sans">
            <div class="contact-info-box">
                <div class="mb-4">
                    <i class="bi bi-geo-alt icon-gold"></i>
                    <h5 class="text-white text-uppercase">Boutique Location</h5>
                    <p class="text-muted">Grand Luxury Plaza, Level 1<br>Jakarta, Indonesia 10220</p>
                </div>
                <div class="mb-4">
                    <i class="bi bi-envelope icon-gold"></i>
                    <h5 class="text-white text-uppercase">Email VIP</h5>
                    <p class="text-muted">concierge@tepluxury.com</p>
                </div>
                <div>
                    <i class="bi bi-telephone icon-gold"></i>
                    <h5 class="text-white text-uppercase">Private Line</h5>
                    <p class="text-muted">+62 21 5555 8888</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid p-0 mt-5 border-top border-secondary opacity-50">
    <div style="height: 300px; background: #222; display: flex; align-items: center; justify-content: center;">
        <span class="text-muted text-uppercase letter-spacing-2">Google Maps Integration Area</span>
    </div>
</div>
@endsection