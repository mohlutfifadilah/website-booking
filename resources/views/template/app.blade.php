<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Website Booking Gunung Slamet via Dipajaya | @yield('title')</title>
    <link rel="stylesheet" href="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
    <link rel="icon" href="{{ asset('Desain tanpa judul_20240306_013235_0000.png') }}">
    <style>
        .menu li a.link {
          transition: color 0.3s ease;
        }

        .menu li a.link.active {
          font-weight: bold;
          color: #2299e8;
          border-bottom: 2px solid #2299e8;
          transform: scale(1.0);
        }

        .menu li a.link:hover {
          color: #2299e8;
          border-bottom: 2px solid #2299e8;
          transition: color 0.3s ease, border-bottom 0s; /* Transisi untuk warna tetapi tidak ada transisi untuk border-bottom */
          transition-duration: 0.3s, border-bottom 0s; /* Durasi transisi saat hover */
          transition-timing-function: ease; /* Fungsi penyangga transisi */
        }
    </style>
  </head>
  <body>

<!-- Navigation -->
<div class="title-bar" data-responsive-toggle="realEstateMenu" data-hide-for="small">
  <button class="menu-icon" type="button" data-toggle></button>
  <div class="title-bar-title"></div>
</div>

<div class="top-bar fixed-top" id="realEstateMenu">
  <div class="top-bar-left">
    <ul class="menu" data-responsive-menu="accordion">
      <li class="menu-text" style="padding: 0;"><img src="{{ asset('Desain tanpa judul_20240306_002237_0000.png') }}" alt="" style="width: 200px; height: 55px;" class=""></li>
    </ul>
  </div>
  <div class="top-bar-right">
    <ul class="menu" style="margin-top: 5px;">
      <li><a href="/" class="{{ $segment === 'beranda' ? 'active' : '' }} link">Beranda</a></li>
      <li><a href="/beritaa" class="{{ $segment === 'beritaa' ? 'active' : '' }} link">Berita</a></li>
      <li><a href="/panduan" class="{{ $segment === 'panduan' ? 'active' : '' }} link">Panduan Booking</a></li>
      <li><a href="/cek_kuota" class="{{ $segment === 'cek_kuota' ? 'active' : '' }} link">Cek Kuota</a></li>
      <li><a href="/sop" class="{{ $segment === 'sop' ? 'active' : '' }} link" style="margin-right: 20px;">S.O.P</a></li>
      {{-- <li><a class="button" href="#">Booking Sekarang</a></li> --}}
      <li><a href="/register" class="button">Daftar</a></li>
    </ul>
  </div>
</div>
<!-- /Navigation -->


<br>

@yield('content')

<footer>
  <div class="row expanded callout secondary" style="margin-bottom: 0;">

    <div class="small-6 large-3 columns">
      <img class="center-text" src="{{ asset('Desain tanpa judul_20240306_002237_0000.png') }}" alt="Photo of Uranus." style="margin-top: 23px;">
    </div>
    <div class="small-6 large-3 columns">
      <p class="lead padding-3">Lokasi</p>
      <ul class="menu vertical">
            <li style="padding-bottom: 16px;"><ion-icon name="logo-whatsapp"></ion-icon> Helpdesk : +62 811-2850-6666</li>
            <li style="padding-bottom: 16px;"><ion-icon name="mail-sharp"></ion-icon> Email : dawdnw@gmail.com</li>
      </ul>
    </div>
    <div class="small-6 large-3 columns">
      <p class="lead padding-3">Informasi</p>
      <ul class="menu vertical">
            <li style="padding-bottom: 16px;"><ion-icon name="logo-whatsapp"></ion-icon> Helpdesk : +62 811-2850-6666</li>
            <li style="padding-bottom: 16px;"><ion-icon name="mail-sharp"></ion-icon> Email : dawdnw@gmail.com</li>
      </ul>
      {{-- <p class="lead padding-3" style="margin-top: 20px;">Sosial Media</p>
      <ul class="menu vertical">
            <li style="padding-bottom: 16px;"><ion-icon name="logo-instagram"></ion-icon> dawd</li>
            <li style="padding-bottom: 16px;"><ion-icon name="logo-youtube"></ion-icon> dawdaw</li>
      </ul> --}}
    </div>
    <div class="small-6 large-3 columns">
      <p class="lead padding-3">Sosial Media</p>
      <ul class="menu vertical">
            <li style="padding-bottom: 16px;"><ion-icon name="logo-instagram"></ion-icon> dawd</li>
            <li style="padding-bottom: 16px;"><ion-icon name="logo-youtube"></ion-icon> dawdaw</li>
      </ul>
    </div>

    {{-- <div class="small-6 large-6 columns">
      <p class="lead">Lokasi</p>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.1688757857273!2d109.25856987450067!3d-7.221569970909814!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6ff34da699bf8d%3A0xe76ca7eaf2d2fd7f!2sBasecamp%20Pendakian%20Gunung%20Slamet%20via%20Dipajaya%20-%20Pemalang!5e0!3m2!1sid!2sid!4v1709183804078!5m2!1sid!2sid" width="569" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div> --}}


  </div>
  <div class="row">

    <div class="medium-6 columns">
      <ul class="menu">
      </ul>
    </div>

    <div class="medium-6 columns">
      <ul class="menu float-right">
        <li class="menu-text">Copyright 2024</li>
      </ul>
    </div>
  </div>

</footer>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
