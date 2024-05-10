@extends('template.app')
@section('content')
@section('title', 'Daftar')
<div class="row column">
  <nav aria-label="You are here:" role="navigation">
    <ul class="breadcrumbs">
        <li><a href="/">Beranda</a></li>
        <li>
        <span class="show-for-sr">Current: </span>Daftar
        </li>
    </ul>
    </nav>
</div>
<div class="row column">
    <h4>Isi formulir dibawah ini menggunakan data diri anda yang <b>se benar benarnya</b></h4>
</div>

<form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="columns large-12">
            <div class="grid-container">
                <div class="grid-x grid-padding-x">
                    <label>Kewarganegaraan
                        <select name="kewarganegaraan" aria-describedby="kewarganegaraan">
                            <option value="" selected readonly>Pilih Kewarganegaraan</option>
                            @foreach ($kw as $k)
                                <option value="{{ $k->jenis_kewarganegaraan }}">{{ $k->jenis_kewarganegaraan }}</option>
                            @endforeach
                        </select>
                    </label>
                    @if (session('kewarganegaraan'))
                        <p class="help-text" id="kewarganegaraan" style="color: red;">{{ session('kewarganegaraan') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="columns large-6">
            <div class="grid-container">
                <div class="grid-x grid-padding-x">
                    <div class="medium-12 cell">
                        <label>Jenis Identitas
                            <select name="identitas" aria-describedby="identitas">
                                <option value="" selected readonly>Pilih Identitas</option>
                                @foreach ($identitas as $i)
                                <option value="{{ $i->jenis_identitas }}">{{ $i->jenis_identitas }}</option>
                                @endforeach
                            </select>
                        </label>
                        @if (session('identitas'))
                            <p class="help-text" id="identitas" style="color: red;">{{ session('identitas') }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="columns large-6">
            <div class="grid-container">
                <div class="grid-x grid-padding-x">
                    <div class="medium-12 cell">
                        <label class="display-block margin-bottom-1">
                            <span>Upload File Identitas</span> <br />
                            <span class="button primary">Pilih File</span>
                            <input name="fotoidentitas" type="file" class="show-for-sr" aria-describedby="fotoidentitas" />
                        </label>
                        @if (session('fotoidentitas'))
                            <p class="help-text" id="fotoidentitas" style="color: red;">{{ session('fotoidentitas') }}</p>
                        @endif
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
                        <label>Nama Lengkap
                            <input type="text" placeholder="" name="nama_lengkap" aria-describedby="nama_lengkap">
                        </label>
                        @if (session('nama_lengkap'))
                            <p class="help-text" id="nama_lengkap" style="color: red;">{{ session('nama_lengkap') }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="columns large-6">
            <div class="grid-container">
                <div class="grid-x grid-padding-x">
                    <div class="medium-12 cell">
                        <label>Nomor KTP
                            <input type="text" placeholder="" name="no_identitas" aria-describedby="no_identitas">
                        </label>
                        @if (session('no_identitas'))
                            <p class="help-text" id="no_identitas" style="color: red;">{{ session('no_identitas') }}</p>
                        @endif
                    </div>
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
                            <label>Email
                                <input type="text" placeholder="" name="email" aria-describedby="email">
                            </label>
                            @if (session('email'))
                                <p class="help-text" id="email" style="color: red;">{{ session('email') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
    </div>
    <div class="columns large-6">
        <div class="grid-container">
                    <div class="grid-x grid-padding-x">
                        <div class="medium-12 cell">
                            <label>Nomor Telepon
                            <input type="text" placeholder="" name="no_telepon" aria-describedby="no_telepon">
                            </label>
                            @if (session('no_telepon'))
                                <p class="help-text" id="no_telepon" style="color: red;">{{ session('no_telepon') }}</p>
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
        <div class="columns large-2">
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
        <div class="columns large-2">
            <div class="grid-container">
                <div class="grid-x grid-padding-x">
                    <div class="medium-12 cell">
                        <label>Tinggi Badan
                            <input type="text" placeholder="" name="tinggi_badan" aria-describedby="tinggi_badan">
                        </label>
                        @if (session('tinggi_badan'))
                            <p class="help-text" id="tinggi_badan" style="color: red;">{{ session('tinggi_badan') }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="columns large-2">
            <div class="grid-container">
                <div class="grid-x grid-padding-x">
                    <div class="medium-12 cell">
                        <label>Berat Badan
                            <input type="text" placeholder="" name="berat_badan" aria-describedby="berat_badan">
                        </label>
                        @if (session('berat_badan'))
                            <p class="help-text" id="berat_badan" style="color: red;">{{ session('berat_badan') }}</p>
                        @endif
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
                                <label>Username
                                <input type="text" placeholder="" name="username" aria-describedby="username">
                                </label>
                                @if (session('username'))
                                    <p class="help-text" id="username" style="color: red;">{{ session('username') }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
        </div>
        <div class="columns large-6">
            <div class="grid-container">
                        <div class="grid-x grid-padding-x">
                            <div class="medium-12 cell">
                                <label>Password
                                <input type="password" placeholder="" name="password" aria-describedby="password">
                                </label>
                                @if (session('password'))
                                    <p class="help-text" id="password" style="color: red;">{{ session('password') }}</p>
                                @endif
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
@endsection

