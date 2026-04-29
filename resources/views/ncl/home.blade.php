@extends('layouts.app')
@section('content')

<!-- HERO -->
<head>
    <link rel="stylesheet" href="{{ asset('build/assets/app-BmAVGTu2.css') }}">
<script src="{{ asset('build/assets/app-CKl8NZMC.js') }}" defer></script>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

@if($hero)
<section class="hero" 
    style="background-image: url('{{ $hero->image }}');">
    
    <div class="hero-overlay"></div>
    <div class="hero-smoke"></div>

    <div class="hero-text">
        <h2>{{ $hero->title }}</h2>
        <p>{{ $hero->subtitle }}</p>
        <a href="{{ $hero->button_link }}">
            {{ $hero->button_text }}
        </a>
    </div>
@endif
{{-- Hero Cards --}}
    @if(isset($heroCards) && $heroCards->count())
    <div class="hero-card-wrapper">
    @foreach($heroCards as $card)
        <div class="hero-card-item">
            <h3 class="card-title">{{ $card->keterangan }}</h3>
            <p class="card-alert">{{ $card->alert }}</p>
            
            
        </div>
    @endforeach
</div>
    @endif
     

</section>

<style>
/* ===== HERO SECTION ===== */

.hero {
    position: relative;
    width: 100%;
    min-height: 100vh; /* full screen */
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    color: white;
    padding: clamp(40px, 6vw, 80px);
    overflow: hidden;

    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;

    /* Animasi muncul pudar + zoom */
    animation: bgFadeIn 1.5s ease forwards;
    z-index: 0;
}

.hero-card-wrapper {
    max-width: 1100px;
    width: 90%;
    position: absolute;
    bottom: 30px; /* jarak dari bawah hero */
    left: 50%;
    transform: translateX(-50%);
    
    display: flex;
    gap: 30px;
    justify-content: center;
    align-items: center;

    flex-wrap: nowrap; /* biar horizontal terus */
    z-index: 5;
}

/* Bentuk organic */
.hero-card-item {
    flex: 0 0 260px;
    padding: 20px 25px;
    box-sizing: border-box;
    background: #ffffff;
    border-radius: 30px 0px 30px 0px;
    position: relative;
    min-width: 240px;
    text-align: center;
    transition: 0.3s ease;
}

/* Shadow belakang */
.hero-card-item::before {
    content: "";
    position: absolute;
    inset: 0;
    border-radius: 60px 40px 60px 40px;
    background: rgba(0,0,0,0.08);
    transform: translate(10px, 10px);
    z-index: -1;
}

/* Hover biar hidup */
.hero-card-item:hover {
    transform: translateY(-8px);
}

/* Gradient biru */
.card-title {
    font-size: 28px;
    font-weight: bold;
    background: linear-gradient(90deg, #0052D4, #4364F7, #6FB1FC);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 8px;
}

.card-alert {
    color: #444;
    font-size: 16px;
}

/* Animasi Fade In Background */
@keyframes bgFadeIn {
    0% {
        opacity: 0;
        transform: scale(1.05); /* sedikit zoom out */
    }
    100% {
        opacity: 1;
        transform: scale(1); /* ukuran normal */
    }
}

/* Overlay Gelap agar teks terbaca */
.hero-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(
        120deg,
        rgba(0,0,0,0.75),
        rgba(11,77,162,0.6),
        rgba(0,0,0,0.75)
    );
    z-index: 1;
}

/* Layer Smoke */
.hero-smoke {
    position: absolute;
    inset: 0;
    background: url('https://www.transparenttextures.com/patterns/smoke.png') repeat;
    opacity: 0.15;
    animation: smokeMove 60s linear infinite;
    z-index: 2;
}

/* Animasi Smoke bergerak horizontal */
@keyframes smokeMove {
    0% { background-position: 0 0; }
    100% { background-position: 1000px 0; } /* bisa sesuaikan jarak */
}

/* Konten Hero agar berada di depan overlay dan smoke */
.hero-text {
    position: relative;
    z-index: 3;
    max-width: 800px;
}


/* Konten di atas semuanya */
.hero-text {
    position: relative;
    z-index: 3;

    opacity: 0;
    transform: translateY(40px);
    transition: all 1s ease;
}

.hero-text.show {
    opacity: 1;
    transform: translateY(0);
}

.hero-text h2 {
    font-size: clamp(36px, 5vw, 60px);
    margin-bottom: 20px;
    text-shadow: 0 10px 30px rgba(0,0,0,.5);
}

.hero-text p {
    font-size: 18px;
    margin-bottom: 30px;
    opacity: .95;
}

.hero-text a {
    display: inline-block;
    background: white;
    color: #0b4da2;
    padding: 14px 36px;
    border-radius: 30px;
    text-decoration: none;
    font-weight: 600;
    transition: .3s ease;
}

.hero-text a:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 25px rgba(0,0,0,.3);
}

/* Smoke Animation */
@keyframes smokeMove {
    from { background-position: 0 0; }
    to { background-position: 1000px 0; }
}

/* ===== RESPONSIVE ===== */
@media (max-width: 900px) {
    .hero {
        grid-template-columns: 1fr;
        text-align: center;
    }

    .hero-image img {
        height: auto;
        max-height: 500px;
    }

    .hero-text {
        transform: translateY(40px);
    }

    .hero-text.show {
        transform: translateY(0);
    }

    .hero-image {
        transform: translateY(40px);
    }

    .hero-image.show {
        transform: translateY(0);
    }
@media (max-width: 768px) {

    .hero-card-wrapper {
        width: 100%;
        left: 0;
        transform: none;
        padding: 0 5px;
        gap: 8px;
        flex-wrap: nowrap;
        justify-content: center;
        box-sizing: border-box;
    }

    .hero-card-item {
        min-width: 0; /* INI PENTING */
        flex: 0 0 calc((100% - 24px) / 4);
        padding: 8px 4px;
        border-radius: 20px 0 20px 0;
        box-sizing: border-box;
    }

    .card-title {
        font-size: 12px;
    }

    .card-alert {
        font-size: 10px;
    }
}
    
}

</style>
<script>
const hero = document.querySelector('.hero');
const heroText = document.querySelector('.hero-text');
const heroImage = document.querySelector('.hero-image');

const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            heroText.classList.add('show');
            heroImage.classList.add('show');
        } else {
            heroText.classList.remove('show');
            heroImage.classList.remove('show');
        }
    });
}, { threshold: 0.4 });

observer.observe(hero);
</script>


<section id="kelas">
    <div class="section-title">
        <div class="cta-text fade-left">
           <h3 class="judul">Paket Kelas Renang</h3>
           <p class="subjudul">Pilih kelas sesuai kebutuhan kamu</p>
        </div>
    </div>

    <div class="scroll-indicator">
    
    <div class="scroll-line"></div>
</div>

    <div class="kelas">
        <div id="popupModal" class="modal">
    <div class="modal-content" style="margin-top: 250px;">
        <span class="close" onclick="closeModal()">&times;</span>
        
        <h3 id="modalTitle"></h3>
        <p id="modalHarga"></p>

        <a id="daftarLink" href="#" class="btn-daftar">Daftar Sekarang</a>
    </div>
</div>
        @foreach($kelas as $item)
        <div class="kelas-card fade-up">
            <div>
                <h4>{{ $item->nama }}</h4>
                <p>{{ $item->deskripsi }}</p>
            </div>
             <div class="kelas-harga">
                @if($item->harga_1)
    <div class="harga-item" 
         onclick="openModal('{{ $item->nama }}', '{{ $item->harga_1 }}')">
        {{ $item->harga_1 }}
    </div>
@endif

                @if($item->harga_2)
    <div class="harga-item privat" 
         onclick="openModal('{{ $item->nama }}', '{{ $item->harga_2 }}')">
        {{ $item->harga_2 }}
    </div>
@endif
            </div>
        </div>
        @endforeach
    </div>
    
</section>
<script>
function openModal(nama, harga) {
    document.getElementById('popupModal').style.display = 'block';
    document.getElementById('modalTitle').innerText = nama;
    document.getElementById('modalHarga').innerText = harga;

    // arah ke halaman daftar + kirim data
    document.getElementById('daftarLink').href = 
        "/pendaftaran?kelas=" + encodeURIComponent(nama) + "&harga=" + encodeURIComponent(harga);
}

function closeModal() {
    document.getElementById('popupModal').style.display = 'none';
}

// klik luar modal = close
window.onclick = function(event) {
    let modal = document.getElementById('popupModal');
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

<style>
    
/* ===== SECTION KELAS - WHITE GEOMETRIC ===== */
.modal {
    display: none;
    position: fixed;
    z-index: 999;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.6);
}

.modal-content {
    background: #fff;
    padding: 25px;
    border-radius: 12px;
    width: 90%;
    max-width: 400px;
    margin: 10% auto;
    text-align: center;
    animation: fadeIn 0.3s ease;
}

.close {
    float: right;
    font-size: 22px;
    cursor: pointer;
}

.btn-daftar {
    display: inline-block;
    margin-top: 15px;
    padding: 10px 20px;
    background: #0ea5e9;
    color: #fff;
    border-radius: 8px;
    text-decoration: none;
}

.harga-item {
    cursor: pointer;
    transition: 0.2s;
}

.harga-item:hover {
    transform: scale(1.05);
    background: #e0f2fe;
}

@keyframes fadeIn {
    from {opacity: 0; transform: scale(0.9);}
    to {opacity: 1; transform: scale(1);}
}
.judul {
    font-size: 2rem; /* Bisa diubah sesuai kebutuhan */
    font-weight: 600;
    background: linear-gradient(90deg, #1e3a8a, #3b82f6); /* Biru gelap ke biru terang */
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    text-shadow: 1px 1px 2px rgba(0,0,0,0.3); /* Shadow halus */
    margin: 0;
}

.subjudul {
    font-size: 1.2rem;
    color: #e0f2fe; /* Putih kebiruan */
    text-shadow: 1px 1px 1px rgba(0,0,0,0.2);
    margin-top: 0.5rem;
}



.section-title {
    text-align: center;
    margin-bottom: 60px;
}

.section-title h3 {
    font-size: 38px;
    margin-bottom: 12px;
}

.section-title p {
    max-width: 500px;
    margin: 0 auto;
    color: #555;
}


#kelas {
    position: relative;
    padding: 90px 20px;
    background: #ffffff;
    overflow: hidden;
}

/* Pattern layer */
#kelas::before {
    content: "";
    position: absolute;
    inset: 0;

    background:
        linear-gradient(135deg, rgba(0,0,0,0.03) 25%, transparent 25%),
        linear-gradient(225deg, rgba(0,0,0,0.03) 25%, transparent 25%),
        linear-gradient(45deg, rgba(0,0,0,0.015) 25%, transparent 25%),
        linear-gradient(315deg, rgba(0,0,0,0.015) 25%, transparent 25%);

    background-size: 260px 260px;
    background-position: 0 0, 130px 130px;
    
    z-index: 0;
}

/* Soft lighting layer */
#kelas::after {
    content: "";
    position: absolute;
    inset: 0;
    background: radial-gradient(circle at 70% 30%, rgba(0,0,0,0.05), transparent 60%);
    
    z-index: 0;
}

/* Pastikan konten di atas background */
#kelas > * {
    position: relative;
    z-index: 2;
}

/* ===== GRID ===== */
.kelas {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 25px;
}

/* ===== CARD ===== */
.kelas-card {
    background-color: #ffffff;
    border-radius: 14px;
    padding: 25px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;

        box-shadow: 
        0 10px 25px rgba(0, 0, 0, 0.08),
        0 20px 50px rgba(0, 60, 150, 0.08);

    transition: transform 0.4s ease, box-shadow 0.4s ease;
}

.kelas-card:hover {
    transform: translateY(-8px);
    box-shadow: 
        0 15px 35px rgba(0, 0, 0, 0.12),
        0 30px 70px rgba(0, 60, 150, 0.15);
}


.kelas-card h4 {
    font-size: 1.3rem;
    margin-bottom: 12px;
    color: #0b4da2;
}

.kelas-card p {
    font-size: 0.95rem;
    color: #555;
    flex-grow: 1;
}

.kelas-card span {
    margin-top: 18px;
    font-weight: bold;
    color: #0b4da2;
    background: #eaf3ff;
    padding: 8px 16px;
    border-radius: 999px;
    align-self: flex-start;
}

/* ===== HARGA STYLE ===== */
.kelas-harga {
    margin-top: 20px;
    display: flex;
    flex-direction: column;
    gap: 12px;
    width: 100%;
}

.harga-item {
    width: 100%;
    box-sizing: border-box;
    font-weight: 700;
    font-size: 1rem;
    color: #0b4da2;
    background: #eaf3ff;
    padding: 12px 16px;
    border-radius: 10px;
    text-align: center;
    transition: all 0.3s ease;
}

.harga-item.privat {
    background: #dbe9ff;
    color: #083d82;
}

.harga-item:hover {
    background: #0b4da2;
    color: #ffffff;
    transform: scale(1.03);
}


/* ===== FADE UP ANIMATION ===== */

@keyframes fadeUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* ===== BACKGROUND ANIMATION ===== */
@keyframes patternMove {
    0% {
        background-position: 0 0, 130px 130px;
    }
    100% {
        background-position: 260px 260px, 390px 390px;
    }
}

@keyframes lightMove {
    0% { background-position: 70% 30%; }
    100% { background-position: 30% 70%; }
}

/* ===== FADE UP BASE STATE ===== */
.fade-up {
    opacity: 0;
    transform: translateY(40px);
    transition: opacity 0.8s ease, transform 0.8s ease;
}

/* Saat muncul */
.fade-up.show {
    opacity: 1;
    transform: translateY(0);
}

/* Delay bertahap untuk card */
.kelas-card:nth-child(1) { transition-delay: 0.1s; }
.kelas-card:nth-child(2) { transition-delay: 0.2s; }
.kelas-card:nth-child(3) { transition-delay: 0.3s; }
.kelas-card:nth-child(4) { transition-delay: 0.4s; }
.kelas-card:nth-child(5) { transition-delay: 0.5s; }


   

   @media (max-width: 480px) {

    #kelas {
        padding: 70px 0;
    }

    .section-title {
        padding: 0 20px;
        margin-bottom: 40px;
        text-align: left;
    }

    .kelas {
        display: flex;
        gap: 20px;
        overflow-x: auto;
        overflow-y: hidden;
        padding: 0 20px 20px 20px;

        scroll-snap-type: x mandatory;
        -webkit-overflow-scrolling: touch;

        touch-action: pan-x pan-y; /* boleh geser samping & bawah */
        overscroll-behavior-x: contain;
    }

    /* Scrollbar tipis */
    .kelas::-webkit-scrollbar {
        height: 6px;
    }

    .kelas::-webkit-scrollbar-thumb {
        background: rgba(0,0,0,0.15);
        border-radius: 10px;
    }

    .kelas-card {
        flex: 0 0 80%;
        min-width: 80%;
        scroll-snap-align: start;
        padding: 22px;
    }

    .kelas-card h4 {
        font-size: 1.2rem;
    }

    .kelas-card p {
        font-size: 0.95rem;
    }

    .scroll-indicator {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 20px;
        margin-bottom: 15px;
        font-size: 0.8rem;
        color: #888;
        letter-spacing: 0.5px;
    }

    .scroll-line {
        position: relative;
        width: 60px;
        height: 2px;
        background: rgba(0,0,0,0.1);
        overflow: hidden;
        border-radius: 10px;
    }

    .scroll-line::after {
        content: "";
        position: absolute;
        left: -40%;
        width: 40%;
        height: 100%;
        background: #0b4da2;
        animation: scrollMove 1.5s infinite;
    }

    @keyframes scrollMove {
        0% { left: -40%; }
        100% { left: 100%; }
    }

}


@media (max-width: 480px) {
    #kelas::before {
        background: linear-gradient(to right, transparent 70%, rgba(255,255,255,0.95));
    }
}


</style>
<script>
const fadeElements = document.querySelectorAll('.fade-up');

const fadeObserver = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('show');
            fadeObserver.unobserve(entry.target); // stop observing supaya cuma sekali
        }
    });
}, { threshold: 0.2 });

fadeElements.forEach(el => fadeObserver.observe(el));
</script>

<!-- CTA -->

@if($cta && $cta->is_active)
<section class="cta-section fade-up">
    <div class="cta-wrapper">
        <div class="cta-card fade-up">

            @if($cta->image)
                <div class="cta-image fade-up">
                    <img src="{{ asset('storage/'.$cta->image) }}" 
                         alt="{{ $cta->title }}">
                </div>
            @endif

            <div class="cta-text fade-up">
                <h3>{{ $cta->title }}</h3>
                <p>{{ $cta->subtitle }}</p>

                @if($cta->button_link)
                    <a href="{{ $cta->button_link }}">
                        {{ $cta->button_text }}
                    </a>
                @endif
            </div>

        </div>
    </div>
</section>
@endif



<style>
/* ===== CTA SECTION ===== */
/* ===== FADE UP GLOBAL ===== */
.fade-up {
    opacity: 0;
    transform: translateY(40px);
    transition: opacity 0.6s ease, transform 0.6s ease;
    will-change: opacity, transform;
}

.fade-up.show {
    opacity: 1;
    transform: translateY(0);
}



.cta-section {
    position: relative;
    padding: 100px 20px;
    background: linear-gradient(120deg, #0b4da2, #1e90ff);
    overflow: hidden;
}


/* Wrapper */
.cta-wrapper {
    max-width: 1200px;
    margin: auto;
}

/* Card container */
.cta-card {
    display: flex;
    align-items: center;
    gap: 50px;
    background: #ffffff;
    border-radius: 24px;
    padding: 50px;
    box-shadow: 0 25px 50px rgba(0,0,0,0.15);
}

/* Image */
.cta-image {
    flex: 1;
}

.cta-image img {
    width: 100%;
    height: 100%;
    max-height: 420px;
    object-fit: cover;
    border-radius: 18px;
}

/* Text */
.cta-text {
    flex: 1;
}

.cta-text h3 {
    font-size: clamp(26px, 4vw, 36px);
    margin-bottom: 18px;
    color: #0b4da2;
}

.cta-text p {
    font-size: 16px;
    line-height: 1.7;
    margin-bottom: 28px;
    color: #444;
}

/* Button */
.cta-text a {
    display: inline-block;
    padding: 14px 36px;
    background: #0b4da2;
    color: #ffffff;
    border-radius: 999px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
}

.cta-text a:hover {
    background: #083a82;
    transform: translateY(-3px);
    box-shadow: 0 12px 25px rgba(0,0,0,0.2);
}



/* Responsive */
@media (max-width: 900px) {
    .cta-card {
        flex-direction: column;
        text-align: center;
        padding: 40px;
    }

    .cta-image img {
        max-height: 300px;
    }
}
</style>




   <!-- GALLERY -->
<section class="gallery">
    <div class="section-title fade-left">
        <h3 class="galeri-judul">GALERI KEGIATAN</h3>
        <p calss="galeri-subjudul">Momen latihan dan aktivitas NCL Swimming Club</p>
    </div>

    <div class="gallery-scroll">
    <button class="gallery-nav prev">&#10094;</button>

    <div class="gallery-slider">
        @foreach($gallery->where('is_active', true)->sortBy('sort_order') as $img)
        <div class="gallery-slide">
            <div class="gallery-item">
                <img 
                    src="{{ asset('storage/'.$img->image) }}" 
                    alt="{{ $img->title }}"
                >
                <div class="gallery-caption">
                    <h4>{{ $img->title }}</h4>
                    <p>{{ $img->keterangan }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <button class="gallery-nav next">&#10095;</button>
</div>
    </div>
</section>
<div id="imageModal"
     class="fixed inset-0 bg-white hidden items-center justify-center z-50">

    <span id="closeModal"
        class="absolute top-6 right-8 text-gray-700 text-4xl cursor-pointer">
        &times;
    </span>

    <img id="modalImage"
         class="max-w-[95%] max-h-[90%] rounded-xl shadow-xl">
</div>
<script>
const modal = document.getElementById('imageModal');
const modalImg = document.getElementById('modalImage');
const closeBtn = document.getElementById('closeModal');

document.querySelectorAll('.gallery-item img').forEach(img => {
    img.addEventListener('click', function() {
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        modalImg.src = this.src;
    });
});

closeBtn.addEventListener('click', () => {
    modal.classList.add('hidden');
    modal.classList.remove('flex');
});

modal.addEventListener('click', (e) => {
    if (e.target === modal) {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }
});
</script>
<style>

/* ===== Section Gallery ===== */
.galeri-judul {
    font-size: 2rem; 
    font-weight: 600;
    background: linear-gradient(90deg, #1e3a8a, #3b82f6); 
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    text-shadow: 1px 1px 2px rgba(0,0,0,0.3); 
    margin: 0;
}

.galeri-subjudul {
    font-size: 1.2rem;
    color: #e0f2fe; 
    text-shadow: 1px 1px 1px rgba(0,0,0,0.2);
    margin-top: 0.5rem;
}

.gallery {
    position: relative;
    padding: 160px 80px;
    background: linear-gradient(135deg, #ffffff 0%, #f5f9ff 100%);
    overflow: hidden;
    font-family: 'Arial', sans-serif;
}

.gallery::before {
    content: "";
    position: absolute;
    inset: 0;

    background:
        linear-gradient(135deg, rgba(0,0,0,0.03) 25%, transparent 25%),
        linear-gradient(225deg, rgba(0,0,0,0.03) 25%, transparent 25%),
        linear-gradient(45deg, rgba(0,0,0,0.015) 25%, transparent 25%),
        linear-gradient(315deg, rgba(0,0,0,0.015) 25%, transparent 25%);

    background-size: 260px 260px;
    background-position: 0 0, 130px 130px;
    
    z-index: 0;
}

.gallery::after {
    content: "";
    position: absolute;
    inset: 0;
    background: 
        radial-gradient(circle at 20% 30%, rgba(11, 77, 162, 0.12), transparent 50%),
        radial-gradient(circle at 80% 70%, rgba(0, 60, 150, 0.08), transparent 60%);
    
    z-index: 0;
}

.gallery > * {
    position: relative;
    z-index: 2;
}


/* ===== Title ===== */
.section-title {
    text-align: center;
    margin-bottom: 60px;
}

.section-title h3 {
    font-size: 2.4rem;
    color: #222;
    margin-bottom: 10px;
}

.section-title p {
    font-size: 1.05rem;
    color: #666;
}

/* ===== Grid ===== */
.gallery-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 32px;
}

/* ===== Item ===== */
.gallery-item {
    position: relative;
    overflow: hidden;
    border-radius: 18px;
    cursor: pointer;
    box-shadow: 0 12px 30px rgba(0,0,0,0.12);
    transition: transform 0.4s ease, box-shadow 0.4s ease;
}

/* ===== Fade Up Animation ===== */
.fade-up {
    opacity: 0;
    transform: translateY(40px);
    transition: all 0.8s cubic-bezier(.22,.61,.36,1);
}

.fade-up.show {
    opacity: 1;
    transform: translateY(0);
}

/* ===== Hover ===== */
.gallery-item:hover {
    transform: translateY(-6px);
    box-shadow: 0 20px 50px rgba(0,0,0,0.18);
}

/* ===== Image ===== */
.gallery-item img {
    width: 100%;
    aspect-ratio: 10 / 13;
    object-fit: cover;
    transition: transform 0.6s ease;
}

.gallery-item:hover img {
    transform: none;
}

/* ===== Caption ===== */
.gallery-item {
    background: #ffffff;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 12px 30px rgba(0,0,0,0.12);
    transition: transform 0.4s ease, box-shadow 0.4s ease;
    display: flex;
    flex-direction: column;
}

.gallery-item img {
    width: 100%;
    aspect-ratio: 10 / 13;
    object-fit: cover;
    display: block;
}

.gallery-caption {
    padding: 18px;
    background: #ffffff;
}

.gallery-caption h4 {
    margin: 0;
    font-size: 1.1rem;
    color: #111;
}

.gallery-caption p {
    margin-top: 6px;
    font-size: 0.9rem;
    color: #666;
}


.gallery-caption h4 {
    margin: 0;
    font-size: 1.1rem;
}

.gallery-caption p {
    margin-top: 6px;
    font-size: 0.9rem;
    opacity: 0.9;
}


/* ===== CONTAINER SECTION ===== */
.gallery-section {
    max-width: 1200px;
    margin: 0 auto;
    padding: 80px 20px;
}

/* ===== TITLE ===== */
.gallery-header {
    text-align: center;
    margin-bottom: 50px;
}

.gallery-header h2 {
    font-size: 36px;
    font-weight: 700;
    margin-bottom: 10px;
}

.gallery-header p {
    color: #6c757d;
    font-size: 16px;
}

/* ===== GRID DESKTOP ===== */
@media (min-width: 992px) {

    .gallery-slider {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 30px;
        transform: none !important;
    }

    .gallery-slide {
        min-width: auto;
    }

    .gallery-nav {
        display: none;
    }

    .gallery-item {
        background: #fff;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 8px 20px rgba(0,0,0,0.06);
        transition: 0.3s ease;
    }

    .gallery-item:hover {
        transform: translateY(-6px);
    }

    .gallery-item img {
        width: 100%;
        height: 280px;
        object-fit: cover;
        display: block;
    }

    .gallery-content {
        padding: 20px;
    }

}

/* ===== Responsive ===== */
@media (max-width: 768px) {

    .gallery {
        padding: 100px 0;
    }

    .gallery-scroll {
        position: relative;
        overflow: hidden;
    }

    .gallery-slider {
        display: flex;
        transition: transform 0.5s ease;
    }

    .gallery-slide {
        min-width: 100%;
    }

    .gallery-item {
        position: relative;
        border-radius: 30px;
        overflow: hidden; /* penting supaya gambar ikut rounded */
        margin: 0 25px;
        background: #eee;
    }

    /* gambar */
    .gallery-item img {
    width: 100%;
    height: 65vh;
    object-fit: cover;
    display: block;
}

    /* panel bawah */
    .gallery-caption{
    position:absolute;
    bottom:0;
    width:100%;
    background:#fff;
    padding:28px 22px;

    border-top-left-radius:40px;
    border-top-right-radius:40px;
}

    .gallery-caption h4 {
        font-size: 18px;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .gallery-caption p {
        font-size: 14px;
        color: #666;
    }

    /* === NAVIGATION BUTTON === */

    .gallery-nav {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        border: none;
        background: transparent;
        font-size: 24px;
        color: #0b4da2;
        cursor: pointer;
        z-index: 20;
    }

    .gallery-nav.prev {
        left: 15px;
    }

    .gallery-nav.next {
        right: 15px;
    }

}


</style>
<script>
document.addEventListener("DOMContentLoaded", function () {

    const elements = document.querySelectorAll('.fade-up');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('show');
                observer.unobserve(entry.target); // stop observing supaya cuma sekali
            }
        });
    }, {
        threshold: 0.2
    });

    elements.forEach(el => observer.observe(el));

});
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {

    const slider = document.querySelector(".gallery-slider");
    const slides = document.querySelectorAll(".gallery-slide");
    const nextBtn = document.querySelector(".gallery-nav.next");
    const prevBtn = document.querySelector(".gallery-nav.prev");

    let index = 0;

    function updateSlide() {
        slider.style.transform = `translateX(-${index * 100}%)`;
    }

    nextBtn.addEventListener("click", () => {
        if (index < slides.length - 1) {
            index++;
        } else {
            index = 0; // balik ke awal
        }
        updateSlide();
    });

    prevBtn.addEventListener("click", () => {
        if (index > 0) {
            index--;
        } else {
            index = slides.length - 1; // ke terakhir
        }
        updateSlide();
    });

});
</script>


@if($about)
<section class="about fade-up">
    <div class="about-wrapper fade-up">

        <!-- KIRI -->
        <div class="about-content fade-up">
            <span class="about-tag">Tentang Kami</span>
            <h2>{{ $about->title }}</h2>
            <p>{{ $about->description }}</p>
             <div class="about-social-vertical">
    <a href="https://wa.me/628xxxx" target="_blank">
        <i class="fab fa-whatsapp"></i>
        <span>@Ncl_swimming_club</span>
    </a>
    <a href="https://instagram.com/username" target="_blank">
        <i class="fab fa-instagram"></i>
        <span>@Ncl_swimming_club</span>
    </a>
    <a href="https://tiktok.com/@username" target="_blank">
        <i class="fab fa-tiktok"></i>
        <span>@Ncl_swimming_club</span>
    </a>
</div>
           

            <div class="about-points"></div>
        </div>

        <!-- KANAN -->
        <div class="about-visual fade-up">
            
            <img src="{{ asset('storage/'.$about->image) }}" alt="About">

           

            <div class="about-badge fade-up">
                <strong>{{ $about->experience_years }}+</strong>
                <span>Tahun<br>Pengalaman</span>
            </div>

        </div>

    </div>
</section>
@endif

<style>
    /* ===== ABOUT BASE ===== */
.about {
    position: relative;
    padding: 120px 20px;
    overflow: hidden;
    background: linear-gradient(120deg, #0b4da2, #1e90ff);
    color: #fff;
}

.about-wrapper {
    max-width: 1200px;
    margin: auto;
    display: grid;
    grid-template-columns: 1.1fr 0.9fr;
    gap: 70px;
    padding: 80px;
    background: #ffffff;
    border-radius: 32px;
    box-shadow: 0 35px 100px rgba(0, 60, 160, 0.35);
}

/* ===== CONTENT ===== */
.about-tag {
    display: inline-block;
    background: rgba(11,77,162,0.1);
    color: #0b4da2;
    padding: 8px 18px;
    border-radius: 30px;
    font-weight: 700;
    margin-bottom: 20px;
}

.about-content h2 {
    font-size: 38px;
    font-weight: 800;
    color: #0b4da2;
    line-height: 1.3;
    margin-bottom: 24px;
}

.about-content p {
    font-size: 16px;
    color: #555;
    line-height: 1.8;
    margin-bottom: 32px;
}

/* ===== POINTS ===== */
.about-points {
    display: grid;
    grid-template-columns: 1fr;
    gap: 14px;
    margin-bottom: 40px;
}

.about-points .point {
    background: #f4f8fb;
    padding: 14px 20px;
    border-radius: 14px;
    font-weight: 600;
    color: #333;
}

/* ===== CTA ===== */
.about-cta {
    display: inline-block;
    padding: 15px 38px;
    background: linear-gradient(135deg, #0b4da2, #1e90ff);
    color: #fff;
    font-weight: 700;
    border-radius: 40px;
    text-decoration: none;
    transition: 0.35s ease;
}

.about-cta:hover {
    transform: translateY(-4px);
    box-shadow: 0 15px 45px rgba(0, 100, 255, 0.45);
}

/* ===== VISUAL ===== */
.about-visual {
    position: relative;
}

.about-visual img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 26px;
    box-shadow: 0 25px 70px rgba(0,0,0,0.25);
}

.about-badge {
    position: relative;
    bottom: 10px;
    left: 10px;
    width: 25% ;
    background: #0b4da2;
    color: #fff;
    padding: 10px 8px;
    border-radius: 22px;
    text-align: center;
    box-shadow: 0 20px 50px rgba(0,0,0,0.35);
}

.about-badge strong {
    font-size: 28px;
    display: block;
}

.about-badge span {
    font-size: 16px;
    opacity: 0.9;
}

/* ===== FADE-UP ANIMATION ===== */
.fade-up {
    opacity: 0;
    transform: translateY(70px);
    transition: all 0.9s cubic-bezier(.22,.61,.36,1);
}

.fade-up.show {
    opacity: 1;
    transform: translateY(0);
}

/* ===== RESPONSIVE ===== */
@media (max-width: 900px) {
    .about-wrapper {
        grid-template-columns: 1fr;
        padding: 50px 30px;
    }

     .about-badge {
        width: 35%;          
        padding: 6px 0;      
        font-size: 11px;
    }
    .about-badge strong {
        font-size: 14px;
    }
    .about-badge span {
        font-size: 9px;
        line-height: 1.1;
    }

}
.fade-up:nth-child(1) { transition-delay: 0.1s; }
.fade-up:nth-child(2) { transition-delay: 0.2s; }
.fade-up:nth-child(3) { transition-delay: 0.3s; }
.fade-up:nth-child(4) { transition-delay: 0.4s; }

/* parent wajib */
.about-visual {
    position: relative;
}

/* posisi icon */
.about-social-vertical {
    position: absolute;
    top: 95%; /* tengah gambar */
    right: 340px; /* keluar dikit dari card */
    transform: translateY(-50%);
    display: flex;
    flex-direction: column;
    gap: 12px;
    z-index: 10;
}

/* container tombol */
.about-social-vertical a {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 10px 16px;
    border-radius: 30px;
    background: #ffffff;
    color: #0b4da2;
    font-size: 16px;
    text-decoration: none;
    box-shadow: 0 6px 15px rgba(0,0,0,0.12);
    transition: 0.3s ease;
}

/* icon bulat */
.about-social-vertical i {
    width: 35px;
    height: 35px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    background: #f4f8fb;
    font-size: 16px;
}

/* teks */
.about-social-vertical span {
    font-weight: 600;
    font-size: 13px;
    white-space: nowrap;
}

/* hover clean (gabung jadi satu) */
.about-social-vertical a:hover {
    transform: translateX(6px) scale(1.05);
}

/* warna brand */
.about-social-vertical a:nth-child(1):hover {
    background: #25D366;
    color: #fff;
}
.about-social-vertical a:nth-child(2):hover {
    background: #E1306C;
    color: #fff;
}
.about-social-vertical a:nth-child(3):hover {
    background: #000;
    color: #fff;
}

@media (max-width: 900px) {
    .about-social-vertical {
        position: static; /* jangan nempel gambar */
        transform: none;
        display: flex;
        flex-direction: column; /* tetap vertikal */
        gap: 12px;
        margin-top: 20px;
        align-items: flex-start;
    }

    .about-social-vertical a {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 10px 14px;
        border-radius: 40px;
        background: #ffffff;
        color: #0b4da2;
        font-size: 15px;
        text-decoration: none;
        box-shadow: 0 6px 15px rgba(0,0,0,0.12);
    }

    .about-social-vertical i {
        width: 42px;
        height: 42px;
        font-size: 18px;
    }

    .about-social-vertical span {
        font-size: 14px;
        font-weight: 600;
    }
}

</style>





@endsection
