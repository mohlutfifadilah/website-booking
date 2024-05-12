@extends('template.app')
@section('title', 'Beranda')
@section('content')

@if (session('sukses'))
    <script>
        // Ambil pesan alert dari session
        let alertMessage = "{{ session('sukses') }}";

        // Tampilkan pesan alert menggunakan JavaScript
        alert(alertMessage);
    </script>
@endif

@if (session('error'))
    <script>
        // Ambil pesan alert dari session
        let alertMessage = "{{ session('error') }}";

        // Tampilkan pesan alert menggunakan JavaScript
        alert(alertMessage);
    </script>
@endif

<div class="row">

  <div class="medium-7 large-6 columns">
    <h1>Selamat Datang, Para Pendaki! </h1>
    <p class="subheader">Setiap detik adalah sebuah cerita yang menunggu untuk dituliskan. Bersiaplah untuk menjelajahi dan menaklukkan gunung yang menantang!<br>Mulai petualanganmu hari ini!</p>
    <a href="/cek_kuota" class="button">Booking Sekarang !</a>
  </div>

  <div class="show-for-large large-3 columns">
    <img src="{{ asset('20240306_003308_0000.png') }}" alt="picture of space">
  </div>

  <div class="medium-5 large-3 columns">
    <div class="callout secondary">
      <form method="post" action="{{ route('login') }}">
        @csrf
        <div class="row">
          <div class="small-12 columns">
            <label>Username
              <input type="text" placeholder="" name="username">
            </label>
          </div>
          <div class="small-12 columns">
            <label>Password
              <input type="password" placeholder="" style="margin-bottom: 5px;" name="password">
            </label>
            @if (session('credentials'))
                <p style="color: red; font-size: 13px; margin-bottom: 5px;">* {{ session('credentials') }}<p>
            @endif
            <small style="margin-bottom: 10px;">Belum punya akun ?<a href="/register"> Daftar</a></small>
            <button type="submit" class="button expanded" style="margin-top: 3px;">Login</button>
          </div>
        </div>
      </form>
    </div>
  </div>

</div>

<div class="row column">
  <hr>
</div>

<div class="row column">
  <p class="lead">Seputar Gunung Slamet</p>
</div>

<div class="row small-up-1 medium-up-2 large-up-3">
    @foreach ($berita as $b)
    <div class="column">
        <div class="callout">
            <p><img src="{{ asset('storage/gambar/' . $b->gambar) }}" alt="" style="width: 350px; height: 350px;"></p>
            <p class="lead">{{ $b->judul }}</p>
            <form action="{{ route('berita_info', $b->id) }}" method="get">
            @csrf
                <button class="button hollow expanded" href="{{ route('berita_info', $b->id) }}">
                    Selengkapnya
                </button>
            </form>
        </div>
    </div>
    @endforeach
</div>

<div class="row column">
  <a href="/beritaa" class="button hollow expanded">Selengkapnya</a>
</div>

@endsection

