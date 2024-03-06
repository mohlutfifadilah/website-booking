@extends('template.app')
@section('title', 'Panduan Booking')
@section('content')
<div class="row column">
  <nav aria-label="You are here:" role="navigation">
    <ul class="breadcrumbs">
        <li><a href="/">Beranda</a></li>
        <li>
        <span class="show-for-sr">Current: </span> Panduan Booking
        </li>
    </ul>
    </nav>
</div>
<div class="row column">
    <h4>Panduan Booking Online : Pendakian Gunung Slamet via Dipajaya</h4>
  <div class="medium-7 large-12 columns">
    <ol>
        <li>Registrasi Akun Pendaki
            <ol style="list-style-type: lower-alpha;">
                <li>ndlawndla</li>
            </ol>
        </li>
        <li>Booking Online</li>
        <li>Perbarui Data Booking</li>
        <li>Pembatalan Booking</li>
        <li>Mulai Pendakian</li>
        <li>Selesai Pendakian</li>
    </ol>
  </div>
</div>
@endsection

