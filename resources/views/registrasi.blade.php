@extends('template.app')
@section('content')
@section('title', 'Daftar')
<div class="row column">
  <nav aria-label="You are here:" role="navigation">
    <ul class="breadcrumbs">
        <li><a href="/">Beranda</a></li>
        <li><a href="/kuotaa">Cek Kuota</a></li>
        <li>
        <span class="show-for-sr">Current: </span>Registrasi
        </li>
    </ul>
    </nav>
</div>
<div class="row column">
    <h4>Registrasi</h4>
</div>

<form action="{{ route('registrasi', $kuota->id) }}" method="post">
    @csrf
    <div class="row">
    <div class="columns large-6">
        <div class="grid-container">
                    <div class="grid-x grid-padding-x">
                        <div class="medium-12 cell">
                            <label>Tanggal Naik
                                <input type="text" placeholder="" name="tanggal_naik" aria-describedby="tanggal_naik" id="dpd1" data-date-format="yyyy-mm-dd" data-date="2012-02-20">
                            </label>
                            @if (session('tanggal_naik'))
                                <p class="help-text" id="tanggal_naik" style="color: red;">{{ session('tanggal_naik') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
    </div>
    <div class="columns large-6">
        <div class="grid-container">
                    <div class="grid-x grid-padding-x">
                        <div class="medium-12 cell">
                            <label>Tanggal Turun
                            <input type="text" placeholder="" name="tanggal_turun" aria-describedby="tanggal_turun" id="dpd2" data-date-format="yyyy-mm-dd" data-date="2012-02-20">
                            </label>
                            @if (session('tanggal_turun'))
                                <p class="help-text" id="tanggal_turun" style="color: red;">{{ session('tanggal_turun') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
        </div>
    </div>
    </div>
    <div class="row">
        <div class="columns large-2">
            <div class="grid-container">
                <div class="grid-x grid-padding-x">
                    <div class="medium-12 cell">
                        <label>Total Pendaki
                            <input type="text" placeholder="" name="total_pendaki" id="total_pendaki" aria-describedby="total_pendaki">
                        </label>
                        @if (session('total_pendaki'))
                            <p class="help-text" id="total_pendaki" style="color: red;">{{ session('total_pendaki') }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="columns large-10">
            <div class="grid-container">
                <div class="grid-x grid-padding-x">
                    <div class="medium-12 cell">
                        <div class="medium-12 cell text-left">
                            <!-- Buttons (actions) -->
                            <button class="submit success button" style="margin-top: 24px;">Daftar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>

    <div id="pendaki-container">
        <div class="row column">
        <hr>
        <p>Pendaki 1</p>
    </div>
    <div class="row">
        <div class="columns large-6">
            <div class="grid-container">
                        <div class="grid-x grid-padding-x">
                            <div class="medium-12 cell">
                                <label>Nama
                                <input type="text" placeholder="" name="nama" aria-describedby="nama">
                                </label>
                                @if (session('nama'))
                                    <p class="help-text" id="nama" style="color: red;">{{ session('nama') }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
        </div>
        <div class="columns large-6">
            <div class="grid-container">
                        <div class="grid-x grid-padding-x">
                            <div class="medium-12 cell">
                                <label>Usia
                                <input type="text" placeholder="" name="usia" aria-describedby="usia">
                                </label>
                                @if (session('usia'))
                                    <p class="help-text" id="usia" style="color: red;">{{ session('usia') }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="columns large-6">
            <div class="grid-container">
                        <div class="grid-x grid-padding-x">
                            <div class="medium-12 cell">
                                <label>No Telepon
                                <input type="text" placeholder="" name="no_telepon" aria-describedby="no_telepon">
                                </label>
                                @if (session('no_telepon'))
                                    <p class="help-text" id="no_telepon" style="color: red;">{{ session('no_telepon') }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
        </div>
        <div class="columns large-6">
            <div class="grid-container">
                        <div class="grid-x grid-padding-x">
                            <div class="medium-12 cell">
                                <label>No Telepon Darurat
                                <input type="text" placeholder="" name="no_telepon_darurat" aria-describedby="no_telepon_darurat">
                                </label>
                                @if (session('no_telepon_darurat'))
                                    <p class="help-text" id="no_telepon_darurat" style="color: red;">{{ session('no_telepon_darurat') }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="columns large-12">
            <div class="grid-container">
                        <div class="grid-x grid-padding-x">
                            <div class="medium-12 cell">
                                <div class="medium-12 cell text-left">
                                    <label>
                                    Alamat
                                        <textarea placeholder="" name="alamat" aria-describedby="alamat"></textarea>
                                    </label>
                                    @if (session('alamat'))
                                        <p class="help-text" id="alamat" style="color: red;">{{ session('alamat') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
    </div>
    </div>

    <div class="row" style="margin-bottom: 15px;">
        <div class="columns large-12">
            <div class="grid-container">
                <div class="grid-x grid-padding-x">
                    <div class="medium-12 cell">
                        <p style="color: red;">* Akun harus menunggu verifikasi dari admin terlebih dahulu untuk bisa login</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row" style="margin-bottom: 15px;">
        <div class="columns large-12">
            <div class="grid-container">
                <div class="grid-x grid-padding-x">
                    <div class="medium-12 cell text-right">
                        <!-- Buttons (actions) -->
                        <button class="submit success button" style="margin: 0;">Daftar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        var nowTemp = new Date();
        var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
        var checkin = $('#dpd1').fdatepicker({
        onRender: function (date) {
            return date.valueOf() < now.valueOf() ? 'disabled' : '';
        }
        }).on('changeDate', function (ev) {
            if (ev.date) {
                if (ev.date.valueOf() > checkout.date.valueOf()) {
                    var newDate = new Date(ev.date);
                    newDate.setDate(newDate.getDate() + 1);
                    checkout.update(newDate);
                }
                checkin.hide();
                $('#dpd2')[0].focus();
            } else {
                console.error('ev.date is null');
            }
        }).data('datepicker');

        var checkout = $('#dpd2').fdatepicker({
            onRender: function (date) {
                return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
            }
        }).on('changeDate', function (ev) {
            checkout.hide();
        }).data('datepicker');
    });

    document.addEventListener('DOMContentLoaded', function() {
        // Dapatkan elemen input dan container formulir
        const totalPendakiInput = document.getElementById('total_pendaki');
        const pendakiContainer = document.getElementById('pendaki-container');

        // Fungsi untuk mengenerate formulir pendaki berdasarkan jumlah total pendaki
        function generatePendakiForms(totalPendaki) {
            pendakiContainer.innerHTML = ''; // Kosongkan container sebelum generate ulang
            for (let i = 1; i <= totalPendaki; i++) {
                // Generate formulir untuk pendaki ke-i
                const pendakiForm = document.createElement('div');
                pendakiForm.classList.add('row', 'pendaki-form');
                pendakiForm.innerHTML = `
                    <div class="columns large-12">
                        <hr>
                        <p>Pendaki ${i}</p>
                    </div>
                    <div class="columns large-6">
                        <div class="grid-container">
                            <div class="grid-x grid-padding-x">
                                <div class="medium-12 cell">
                                    <label>Nama Pendaki ${i}
                                        <input type="text" name="nama_pendaki_${i}" placeholder="" required>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="columns large-6">
                        <div class="grid-container">
                            <div class="grid-x grid-padding-x">
                                <div class="medium-12 cell">
                                    <label>Usia Pendaki ${i}
                                        <input type="text" name="usia_pendaki_${i}" placeholder="" required>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="columns large-6">
                        <div class="grid-container">
                            <div class="grid-x grid-padding-x">
                                <div class="medium-12 cell">
                                    <label>No Telepon Pendaki ${i}
                                        <input type="text" name="no_telepon_pendaki_${i}" placeholder="" required>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="columns large-6">
                        <div class="grid-container">
                            <div class="grid-x grid-padding-x">
                                <div class="medium-12 cell">
                                    <label>No Telepon Darurat Pendaki ${i}
                                        <input type="text" name="no_telepon_darurat_pendaki_${i}" placeholder="" required>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="columns large-12">
                        <div class="grid-container">
                            <div class="grid-x grid-padding-x">
                                <div class="medium-12 cell">
                                    <div class="medium-12 cell text-left">
                                        <label>Alamat Pendaki ${i}
                                            <textarea name="alamat_pendaki_${i}" placeholder="" required></textarea>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `;

                // Tambahkan formulir pendaki ke dalam container
                pendakiContainer.appendChild(pendakiForm);
            }
        }

        // Event listener untuk input total pendaki
        totalPendakiInput.addEventListener('input', function() {
            const totalPendaki = parseInt(totalPendakiInput.value);
            if (!isNaN(totalPendaki) && totalPendaki > 0) {
                generatePendakiForms(totalPendaki);
            } else {
                // Kosongkan container jika input tidak valid
                pendakiContainer.innerHTML = '';
            }
        });
    });
</script>
@endsection

