@extends('template.app')
@section('title', 'Beranda')
@section('content')
<div class="row">

  <div class="medium-7 large-6 columns">
    <h1>Selamat Datang, Para Pendaki! </h1>
    <p class="subheader">Setiap detik adalah sebuah cerita yang menunggu untuk dituliskan. Bersiaplah untuk menjelajahi dan menaklukkan gunung yang menantang!<br>Mulai petualanganmu hari ini!</p>
    <button class="button">Booking Sekarang !</button>
  </div>

  <div class="show-for-large large-3 columns">
    <img src="{{ asset('20240306_003308_0000.png') }}" alt="picture of space">
  </div>

  <div class="medium-5 large-3 columns">
    <div class="callout secondary">
      <form>
        <div class="row">
          <div class="small-12 columns">
            <label>Email
              <input type="text" placeholder="">
            </label>
          </div>
          <div class="small-12 columns">
            <label>Password
              <input type="password" placeholder="">
            </label>
            <button type="submit" class="button expanded">Login</button>
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
  <div class="column">
    <div class="callout">
      <p>Pegasi B</p>
      <p><img src="{{ asset('20240306_010100_0000.png') }}" alt="image of a planet called Pegasi B"></p>
      <p class="lead">Copernican Revolution caused an uproar</p>
      <p class="subheader">Find Earth-like planets life outside the Solar System</p>
    </div>
  </div>
  <div class="column">
    <div class="callout">
      <p>Pegasi B</p>
      <p><img src="https://placehold.it/400x370&text=Pegasi B" alt="image of a planet called Pegasi B"></p>
      <p class="lead">Copernican Revolution caused an uproar</p>
      <p class="subheader">Find Earth-like planets life outside the Solar System</p>
    </div>
  </div>
  <div class="column">
    <div class="callout">
      <p>Pegasi B</p>
      <p><img src="https://placehold.it/400x370&text=Pegasi B" alt="image of a planet called Pegasi B"></p>
      <p class="lead">Copernican Revolution caused an uproar</p>
      <p class="subheader">Find Earth-like planets life outside the Solar System</p>
    </div>
  </div>
</div>

<div class="row column">
  <a class="button hollow expanded">Selengkapnya</a>
</div>

@endsection

