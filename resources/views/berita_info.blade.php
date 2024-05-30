@extends('template.app')
@section('title', 'Berita')
@section('content')
<div class="row column">
  <nav aria-label="You are here:" role="navigation">
    <ul class="breadcrumbs">
        <li><a href="/">Beranda</a></li>
        <li>
        <span class="show-for-sr">Current: </span> Berita
        </li>
    </ul>
    </nav>
</div>
<div class="row small-up-1 medium-up-2 large-up-3">
    <p><img src="{{ asset('storage/gambar/' . $berita->gambar) }}" alt=""></p>
    <p class="lead">{{ $berita->judul }}</p>
    <small>{{ $berita->created_at }}</small>
    <p class="subheader" style="margin-top: 50px;">{!! $berita->isi !!}</p>
</div>
@endsection

