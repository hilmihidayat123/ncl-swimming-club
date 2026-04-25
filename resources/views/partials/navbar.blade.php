<header class="nav-wrapper">
  <nav class="navbar">
    <div class="nav-logo">NCL Swimming Club</div>

    <ul class="nav-menu" id="navMenu">

      <li><a href="{{ route('home') }}">Home</a></li>
      <li><a href="{{ route('pendaftaran') }}">Pendaftaran</a></li>
      <li><a href="{{ url('pelatih') }}">Pelatih</a></li>
      <li><a href="{{ url('pengumuman') }}">Pengumuman</a></li>
      <li><a href="{{ url('jadwal') }}">Jadwal Latihan</a></li>
      <li><a href="{{ url('lokasi') }}">Lokasi</a></li>
    </ul>

    <a href="/admin/login" class="nav-btn">Sign In</a>
    <button class="nav-toggle" id="navToggle">
  ☰
</button>

  </nav>
</header>

<style>
  /* ================= NAVBAR ================= */

/* WRAPPER FLOATING */
.nav-wrapper {
    position: sticky;
    top: 20px;
    z-index: 1000;
    padding: 0 20px;
    font-family: 'Poppins', sans-serif;
}

/* NAVBAR UTAMA */
.navbar {
    max-width: 1200px;
    height: 72px;
    margin: auto;

    background: #ffffff;
    border: 1.5px solid #e3ecf8;
    border-radius: 18px;

    padding: 0 28px;
    display: flex;
    align-items: center;
    justify-content: space-between;

    box-shadow: 0 10px 30px rgba(0,0,0,.08);
    opacity: 1;
    transform: translateY(0);
    transition: box-shadow 0.3s ease;
}


/* NAVBAR SAAT SUDAH LOAD */
.navbar.show {
    opacity: 1;
    transform: translateY(0);
}

/* EFEK SAAT SCROLL */
.navbar.scrolled {
    box-shadow: 0 18px 45px rgba(0,0,0,.14);
}

/* LOGO */
.nav-logo {
    font-size: 22px;
    font-weight: 800;
    line-height: 1;
    background: linear-gradient(90deg, #1e5eff, #1bb7ff);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

/* MENU */
.nav-menu {
    list-style: none;
    display: flex;
    gap: 30px;
}

.nav-menu a {
    font-size: 15px;
    font-weight: 600;
    color: #1e5eff;
    text-decoration: none;
    position: relative;
}

/* HOVER GARIS BAWAH */
.nav-menu a::after {
    content: "";
    position: absolute;
    left: 0;
    bottom: -6px;
    width: 0;
    height: 2px;
    background: linear-gradient(90deg, #1e5eff, #1bb7ff);
    transition: width .3s ease;
}

.nav-menu a:hover::after {
    width: 100%;
}

/* BUTTON */
.nav-btn {
    font-size: 14px;
    font-weight: 600;
    padding: 10px 24px;

    background: linear-gradient(90deg, #1e5eff, #1bb7ff);
    color: #ffffff;
    border-radius: 30px;
    text-decoration: none;

    transition: transform .3s ease, box-shadow .3s ease;
}

.nav-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 12px 25px rgba(30,94,255,.35);
}

/* TOGGLE BUTTON */
.nav-toggle {
    display: none;
    font-size: 24px;
    background: none;
    border: none;
    cursor: pointer;
    color: #1e5eff;
}

/* MOBILE STYLE */
@media (max-width: 768px) {

    .navbar {
        padding: 0 20px;
    }

    .nav-menu {
        position: absolute;
        top: 90px;
        left: 50%;
        transform: translateX(-50%);
        width: 90%;

        background: #ffffff;
        border-radius: 18px;
        box-shadow: 0 15px 40px rgba(0,0,0,.1);

        flex-direction: column;
        align-items: center;
        gap: 20px;
        padding: 25px 0;

        opacity: 0;
        pointer-events: none;
        transition: all .3s ease;
    }

    .nav-menu.active {
        opacity: 1;
        pointer-events: auto;
    }

    .nav-btn {
        display: none;
    }

    .nav-toggle {
        display: block;
    }
}

</style>
<script>

document.addEventListener("DOMContentLoaded", function () {
  const navbar = document.querySelector(".navbar");
  const toggle = document.getElementById("navToggle");
  const menu = document.getElementById("navMenu");

  if (!navbar) return;

  window.addEventListener("scroll", () => {
    navbar.classList.toggle("scrolled", window.scrollY > 40);
  });

  toggle.addEventListener("click", () => {
    menu.classList.toggle("active");
  });
});

</script>