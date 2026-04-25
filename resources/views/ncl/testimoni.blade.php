@extends('layouts.app')

@section('title', 'Layanan - NCL Swimming Club')

@section('content')
<section class="testimoni-section">
    <div class="testimoni-lines"></div>

    <div class="testimoni-container">
        <div class="testimoni-header">
            <span>Testimoni</span>
            <h2>Apa Kata Mereka?</h2>
            <p>Pendapat dari member & orang tua yang sudah merasakan langsung.</p>
        </div>

        <div class="testimoni-grid">
            <div class="testimoni-card">
                <p class="quote">
                    “Anak aku langsung jadi ikan jir woy lah.”
                </p>
                <div class="profile">
                    <div class="avatar">A</div>
                    <div>
                        <h4>Andi Pratama</h4>
                        <span>Orang Tua Murid</span>
                    </div>
                </div>
            </div>

            <div class="testimoni-card">
                <p class="quote">
                    “Latihannya seru, tempatnya nyaman, dan progres kerasa banget.”
                </p>
                <div class="profile">
                    <div class="avatar">R</div>
                    <div>
                        <h4>Rizky</h4>
                        <span>Atlet Junior</span>
                    </div>
                </div>
            </div>

            <div class="testimoni-card">
                <p class="quote">
                    “Jadwal fleksibel dan pelatih profesional. Recomended!”
                </p>
                <div class="profile">
                    <div class="avatar">S</div>
                    <div>
                        <h4>Sinta</h4>
                        <span>Member</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>

/* ================= TESTIMONI SECTION ================= */
.testimoni-section {
    font-family: 'Poppins', sans-serif;
    position: relative;
    min-height: 100vh;
    padding: 120px 20px 90px;
    overflow: hidden;
    color: white;

    background: linear-gradient(120deg, #0b4da2, #1e90ff, #0b4da2);
    background-size: 200% 200%;
    animation: gradientMove 10s ease infinite;
}

/* GLOW */
.testimoni-section::before {
    content: "";
    position: absolute;
    width: 520px;
    height: 520px;
    background: rgba(255,255,255,.16);
    filter: blur(170px);
    top: -160px;
    left: -160px;
    animation: glowFloat 10s ease-in-out infinite alternate;
}

.testimoni-section::after {
    content: "";
    position: absolute;
    width: 460px;
    height: 460px;
    background: rgba(30,144,255,.35);
    filter: blur(190px);
    bottom: -160px;
    right: -160px;
    animation: glowFloat 12s ease-in-out infinite alternate-reverse;
}

/* GARIS HERO */
.testimoni-lines {
    position: absolute;
    inset: 0;
    pointer-events: none;
    background:
        repeating-linear-gradient(
            120deg,
            rgba(255,255,255,0.06) 0px,
            rgba(255,255,255,0.06) 1px,
            transparent 1px,
            transparent 80px
        ),
        repeating-linear-gradient(
            -60deg,
            rgba(255,255,255,0.05) 0px,
            rgba(255,255,255,0.05) 1px,
            transparent 1px,
            transparent 120px
        );
    animation: moveLines 20s linear infinite;
    opacity: .8;
}

/* CONTAINER */
.testimoni-container {
    position: relative;
    z-index: 2;
    max-width: 1200px;
    margin: auto;
}

/* HEADER */
.testimoni-header {
    text-align: center;
    margin-bottom: 70px;
}

.testimoni-header span {
    display: inline-block;
    padding: 8px 20px;
    border-radius: 30px;
    background: rgba(255,255,255,.18);
    font-weight: 600;
    margin-bottom: 16px;
}

.testimoni-header h2 {
    font-size: clamp(32px, 5vw, 44px);
    font-weight: 800;
    margin-bottom: 12px;
}

.testimoni-header p {
    max-width: 620px;
    margin: auto;
    opacity: .95;
    line-height: 1.7;
}

/* GRID */
.testimoni-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 36px;
}

/* CARD */
.testimoni-card {
    background: rgba(255,255,255,0.96);
    color: #333;
    border-radius: 24px;
    padding: 28px;
    border: 1.5px solid rgba(255,255,255,0.7);
    box-shadow: 0 20px 55px rgba(0,0,0,.18);

    transition: .45s ease;
    animation: fadeUp .9s ease both;
}

.testimoni-card:hover {
    transform: translateY(-12px);
    box-shadow: 0 30px 80px rgba(0,0,0,.28);
}

/* ISI */
.quote {
    font-size: 15px;
    line-height: 1.7;
    margin-bottom: 22px;
    color: #444;
}

/* PROFILE */
.profile {
    display: flex;
    align-items: center;
    gap: 14px;
}

.avatar {
    width: 46px;
    height: 46px;
    border-radius: 50%;
    background: linear-gradient(135deg, #1e90ff, #0b4da2);
    color: white;
    display: grid;
    place-items: center;
    font-weight: 700;
}

.profile h4 {
    font-size: 15px;
    font-weight: 700;
    color: #0b4da2;
}

.profile span {
    font-size: 13px;
    color: #666;
}

/* ================= ANIMATION ================= */
@keyframes gradientMove {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

@keyframes glowFloat {
    from { transform: translate(0,0); }
    to { transform: translate(40px,40px); }
}

@keyframes moveLines {
    0% { background-position: 0 0, 0 0; }
    100% { background-position: 400px 400px, -400px -400px; }
}

@keyframes fadeUp {
    from {
        opacity: 0;
        transform: translateY(40px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>
@endsection