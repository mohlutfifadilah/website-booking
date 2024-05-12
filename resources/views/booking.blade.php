@extends('template.app')
@section('title', 'Profil')
@section('content')
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
        <span class="show-for-sr">Current: </span> Booking
        </li>
    </ul>
    </nav>
</div>
<div class="row column">
    <h4>Booking</h4>
    {{-- <p>Data merupakan kuota yang tersedia untuk bulan <b>Maret</b><br>Angka dibawah merupakan <b>sisa kuota</b> yang tersedia</p> --}}
</div>
<div class="row column" style="margin-top: 30px;">
    <p>Dalam Proses</p>
    <hr>
</div>
<div class="row column">
    @if ($pendaftar_first)
        <table class="hover" width="100%">
            <thead>
                <tr>
                    <th width="35%">Kode Pendaki</th>
                    <th width="10%">Tanggal Naik</th>
                    <th width="10%">Tanggal Turun</th>
                    <th width="20%">Total Harga</th>
                    <th width="20%">Registrasi</th>
                    <th width="15%">Opsi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <ul class="accordion" data-accordion data-allow-all-closed="true">
                            <li class="accordion-item is-active" data-accordion-item>
                                <!-- Accordion tab title -->
                                <a href="#" class="accordion-title">{{ $pendaftar_first->kode_pendaki }}</a>

                                <!-- Accordion tab content: it would start in the open state due to using the `is-active` state class. -->
                                <div class="accordion-content" data-tab-content>
                                    <table class="hover" width="100%">
                                        <thead>
                                            <tr>
                                                <th width="25%">Nama</th>
                                                <th width="5%">Usia</th>
                                                <th width="35%">No Telepon / Darurat</th>
                                                <th width="35%">Alamat</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pendaftar as $p)
                                                <tr>
                                                    <td>{{ $p->nama }}</td>
                                                    <td>{{ $p->usia }}</td>
                                                    <td>{{ $p->no_telepon }} / {{ $p->no_telepon_darurat }}</td>
                                                    <td>{{ $p->alamat }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </li>
                        </ul>
                    </td>
                    <td>{{ $pendaftar_first->tanggal_naik }}</td>
                    <td>{{ $pendaftar_first->tanggal_turun }}</td>
                    <td>Rp. {{ number_format($harga * $count_pendaftar, 0, ',', '.') }}</td>
                    <td>{{ $pendaftar_first->created_at }}</td>
                    <td>
                        <form action="{{ route('hapus_booking', $pendaftar_first->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                            <button href="{{ route('hapus_booking', $pendaftar_first->id) }}" class="button alert" onclick="return confirm('Yakin akan membatalkannya ?');"><i class="fas fa-trash"></i> Batal</button>
                         </form>
                    </td>
                </tr>
            </tbody>
        </table>
    @else
        <table class="hover" width="100%">
        <thead>
            <tr>
                <th width="100%"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tidak ada registrasi</td>
            </tr>
        </tbody>
    </table>
    @endif
</div>
<div class="row column" style="margin-top: 30px;">
    <p>Riwayat Pendakian</p>
    <hr>
</div>
<div class="row column">
    @if ($riwayat_first)
        <table class="hover" width="100%">
            <thead>
                <tr>
                    <th width="35%">Kode Pendaki</th>
                    <th width="15%">Tanggal Naik</th>
                    <th width="15%">Tanggal Turun</th>
                    <th width="20%">Total Harga</th>
                    <th width="25%">Registrasi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <ul class="accordion" data-accordion data-allow-all-closed="true">
                            <li class="accordion-item is-active" data-accordion-item>
                                <!-- Accordion tab title -->
                                <a href="#" class="accordion-title">{{ $riwayat_first->kode_pendaki }}</a>

                                <!-- Accordion tab content: it would start in the open state due to using the `is-active` state class. -->
                                <div class="accordion-content" data-tab-content>
                                    <table class="hover" width="100%">
                                        <thead>
                                            <tr>
                                                <th width="25%">Nama</th>
                                                <th width="5%">Usia</th>
                                                <th width="35%">No Telepon / Darurat</th>
                                                <th width="35%">Alamat</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($riwayat as $p)
                                                <tr>
                                                    <td>{{ $p->nama }}</td>
                                                    <td>{{ $p->usia }}</td>
                                                    <td>{{ $p->no_telepon }} / {{ $p->no_telepon_darurat }}</td>
                                                    <td>{{ $p->alamat }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </li>
                        </ul>
                    </td>
                    <td>{{ $riwayat_first->tanggal_naik }}</td>
                    <td>{{ $riwayat_first->tanggal_turun }}</td>
                    <td>Rp. {{ number_format($harga * $count_riwayat, 0, ',', '.') }}</td>
                    <td>{{ $riwayat_first->created_at }}</td>
                </tr>
            </tbody>
        </table>
    @else
        <table class="hover" width="100%">
        <thead>
            <tr>
                <th width="100%"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tidak ada riwayat</td>
            </tr>
        </tbody>
    </table>
    @endif
</div>
<script>
    function formatRupiah(angka) {
        var reverse = angka.toString().split('').reverse().join('');
        var ribuan = reverse.match(/\d{1,3}/g);
        var hasil = ribuan.join('.').split('').reverse().join('');
        return 'Rp ' + hasil;
    }
</script>
@endsection

