@extends('template.app')
@section('title', 'S.O.P')
@section('content')
<div class="row column">
  <nav aria-label="You are here:" role="navigation">
    <ul class="breadcrumbs">
        <li><a href="/">Beranda</a></li>
        <li>
        <span class="show-for-sr">Current: </span> S.O.P
        </li>
    </ul>
    </nav>
</div>
<div class="row column">
    <h4>Standar Operasional Pelaksanaan : Pendakian Gunung Slamet via Dipajaya</h4>
</div>
<div class="row column">
    {{-- <embed src="{{ asset('Surat Izin Ortu.pdf') }}" type="application/pdf" width="100%" height="600px"> --}}
</div>
@endsection

