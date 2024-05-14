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
    <img src="{{ asset('alur-registrasi-akun.png') }}" alt="" width="1000" height="640" style="margin-left: auto; margin-right: auto; display: block; margin-top: 20px;">
  <div class="medium-7 large-12 columns">
    <ol>
        <li><h5>Registrasi Akun Pendaki</h5>
            <ol style="list-style-type: lower-alpha;">
                <li>Masuk ke website Gunung Slamet via Dipajaya Klik “Daftar".</li>
                <li>Klik “Daftar” pada menu website paling kanan.</li>
                <li>Isi data form registrasi dengan valid.</li>
                <li>Pilih identitas (KTP/SIM/Kartu Pelajar/Passport/Kitas) yang mudah terbaca dan upload scan identitasnya.</li>
                <li>Pastikan Email Anda valid, Nomor HP yang Anda daftarkan mempunyai nomor Whatsapp.</li>
                <li>Buat Username dan password yang mudah diingat.</li>
                <li>Setelah klik “Daftar”,Admin Basecamp Gunung Slamet via Dipajaya akan melakukan verifikasi data pendaftaran.</li>
                <li>Jika ada data tidak valid yang perlu diperbaiki, maka akan dikirimkan informasi perbaikan dan link form perbaikan data via Whatsapp untuk selanjutnya bisa diperbaiki oleh calon pendaki.</li>
                <li>Setelah selesai perbaikan data, maka form isian bisa disubmit kembali.</li>
                <li>Akun dan kode pendaki akan aktif setelah dilakukan verifikasi oleh Admin Basecamp.</li>
                <li>Data Akun Pendaki bisa digunakan untuk login via Web.</li>
                <li>Kode Pendaki digunakan saat booking online untuk mendaftarkan pendaki menjadi anggota rombongan.</li>
            </ol>
        </li>
        <li style="margin-top: 20px;"><h5>Booking Online</h5><br><img src="{{ asset('alur-booking.png') }}" alt="" width="1350" height="640"  style="margin-left: auto; margin-right: auto; display: block; margin-top: 20px;">
            <ol style="list-style-type: lower-alpha;">
                <li>Buka halaman resmi Booking Online Pendakian Gunung Slamet via Dipajaya.</li>
                <li>Login menggunakan akun pendaki anda.</li>
                <li>Klik “Booking”, Anda akan masuk ke halaman Booking pendakian.</li>
                <li>Pastikan kuota masih ada pada Menu Cek Kuota.</li>
                <li>Pastikan anggota rombongan yang akan ikut dalam pendakian dalam kondisi sehat.</li>
                <li>Pilih tanggal naik dan turun pendakian, kemudian masukan jumlah anggota pada formulir pendakian dengan data yang sesuai.</li>
                <li>Pastikan kembali data booking Anda!</li>
                <li>Setelah data sudah sesuai, klik tombol “Submit”.</li>
                <li>Lalu pergi ke halaman riwayat booking pada profil sebelah pojok kanan untuk melihat biaya yang perlu di bayarkan nantinya pada basecamp pendakian.</li>
                <li>Pembayaran bisa dibayarkan dengan cara Transfer atau On Site.</li>
                <li>Jika pembayaran melalui transfer, Silakan lanjutkan proses pembayaran melalui ATM, i-Banking, m-Banking, atau teller BRI. Virtual Account juga dapat dibayarkan melalui bank lain selain Bank BRI dengan biaya transfer bank sesuai dengan kebijakan masing-masing Bank.</li>
                <li>Harap mengirimkan bukti transfer melalui Whatsapp ketua rombongan terdaftar. Nomor Whatsapp basecamp dapat dilihat di halaman paling bawah website atau hubungi WA : 0822-2162-4217 (Basecamp)</li>
                <li>Jika pembayaran melalui On site, ketua rombongan wajib menunjukkan kode pendakinya ke pihak basecamp untuk diperiksa total biaya yang harus dibayarkan. Untuk biaya dikenakan sebesar Rp. 35.000/Orang.</li>
            </ol>
        </li>
        <li style="margin-top: 20px;"><h5>Pembatalan Booking</h5>
            <ol style="list-style-type: lower-alpha;">
                <li>Buka halaman resmi Booking Online Pendakian Gunung Slamet via Dipajaya.</li>
                <li>Login menggunakan akun pendaki anda.</li>
                <li>Lalu pergi ke halaman riwayat booking pada profil sebelah pojok kanan untuk melihat riwayat booking pendakian.</li>
                <li>Pada riwayat booking, Klik “Batal” pada opsi sebelah kanan riwayat booking.</li>
                <li>Saat muncul notifikasi klik “Ok”</li>
                <li>Data booking anda berhasil dibatalkan.</li>
            </ol>
        </li>
        <li style="margin-top: 20px;"><h5>Mulai Pendakian</h5>
            <ol style="list-style-type: lower-alpha;">
                <li>Tunjukan kode pendaki ke petugas basecamp jalur pendakian untuk dilakukan pemeriksaan kode dan validasi data.</li>
                <li>Lanjutkan proses pembayaran biaya ke petugas basecamp, jika sudah transfer cukup tunjukkan bukti transfer.</li>
                <li>Cek barang bawaan oleh petugas basecamp.</li>
                <li>Pendaki dipersilakan memulai pendakian.</li>
            </ol>
        </li>
        <li style="margin-top: 20px;"><h5>Selesai Pendakian</h5>
            <ol style="list-style-type: lower-alpha;">
                <li>Pastikan barang bawaan dan sampah dibawa turun bersama.</li>
                <li>Cek barang bawaan oleh petugas jalur pendakian.</li>
                <li>Pendaki dipersilakan untuk pulang.</li>
            </ol>
        </li>
    </ol>
  </div>
</div>
@endsection

