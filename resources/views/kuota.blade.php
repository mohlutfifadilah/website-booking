@extends('template.app')
@section('content')
@section('title', 'Cek Kuota')
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
    <p>Data merupakan kuota yang tersedia untuk bulan <b>Maret</b><br>Angka dibawah merupakan <b>sisa kuota</b> yang tersedia</p>
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
                            <span class="badge badge-alert">Penuh</span>
                        @else
                            <span class="badge badge-success">Tersedia</span>
                        @endif
                    </td>
                    <td>dwa</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

