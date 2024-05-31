@extends('template.app')
@section('content')
@section('title', 'Cek Kuota')
@if (session('error'))
    <script>
        // Ambil pesan alert dari session
        let alertMessage = "{{ session('error') }}";

        // Tampilkan pesan alert menggunakan JavaScript
        alert(alertMessage);
    </script>
@endif
<div class="row column">
  <nav aria-label="You are here:" role="navigation">
    <ul class="breadcrumbs">
        <li><a href="/">Beranda</a></li>
        <li>
        <span class="show-for-sr">Current: </span>Cek Kuota
        </li>
    </ul>
    </nav>
</div>
<div class="row column">
    <h4>Kuota Pendaki : Pendakian Gunung Slamet via Dipajaya</h4>
    <hr>
</div>

<div class="row column">
    <table class="hover" width="100%">
        <thead>
            <tr>
                <th width="25%">Tanggal</th>
                <th width="25%">Kuota</th>
                <th width="35%">Status</th>
                <th width="15%">Opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kuota as $k)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($k->tanggal)->format('d-m-Y') }}</td>
                    <td>{{ $k->kuota_sisa }} / {{ $k->kuota_full }}</td>
                    <td>
                        @if ($k->kuota_sisa === $k->kuota_full)
                            <h2 class="badge alert">Penuh</h2>
                        @else
                            <h2 class="badge primary">Tersedia</h2>
                        @endif
                    </td>
                    <td>
                        @if ($k->kuota_sisa === $k->kuota_full)
                            <p>-</p>
                        @else
                            <a class="button small primary" href="{{ route('bookingg', $k->id) }}">Booking</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

