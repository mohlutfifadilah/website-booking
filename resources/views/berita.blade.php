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
  @foreach ($berita as $b)
    <div class="column">
        <div class="callout">
            <p><img src="{{ asset('storage/gambar/' . $b->gambar) }}" alt="" style="width: 350px; height: 350px;"></p>
            <p class="lead">{{ $b->judul }}</p>
            {{-- <p class="subheader">{{ $b->isi }}</p> --}}
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
@endsection

