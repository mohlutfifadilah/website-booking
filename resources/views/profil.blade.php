@extends('template.app')
@section('title', 'Profil')
@section('content')
<div class="row column">
  <nav aria-label="You are here:" role="navigation">
    <ul class="breadcrumbs">
        <li><a href="/">Beranda</a></li>
        <li>
        <span class="show-for-sr">Current: </span> Profil
        </li>
    </ul>
    </nav>
</div>
<div class="row small-up-12 medium-up-12 large-up-12">
    <div class="card-user-profile">
        {{-- <img class="card-user-profile-img" src="https://images.pexels.com/photos/5439/earth-space.jpg?h=350&auto=compress&cs=tinysrgb" alt="picture of space" /> --}}
        <div class="card-user-profile-content card-section">
            {{-- <div class="card-user-profile-avatar">
            <img src="https://pbs.twimg.com/profile_images/422887689612820482/sZtHMJu5.png" alt="picture of yeti" />
            </div> --}}
            <div class="columns large-4">
                <p class="card-user-profile-name"><b>Kode Pendaki</b> : {{ $user->kode_pendaki }}</p>
            </div>
            @php
                $kewarganegaraan = \App\Models\Kewarganegaraan::find($user->id_kewarganegaraan);
                $identitas = \App\Models\Identitas::find($user->id_identitas);
            @endphp
            <div class="columns large-4">
                <dl>
                    <dt>Nama Lengkap</dt>
                    <dd>{{ $user->nama_lengkap }}</dd>
                    <dt>Jenis dan Nomor Identitas</dt>
                    <dd>&#91; {{ $identitas->jenis_identitas }} &#93; {{ $user->nomor_identitas }}</dd>
                    <dt>Alamat</dt>
                    <dd>{{ $user->alamat }}</dd>
                    <dt>No. Telepon</dt>
                    <dd>{{ $user->no_telepon }}</dd>
                </dl>
            </div>
            <div class="columns large-4">
                <dl>
                    <dt>Email</dt>
                    <dd>{{ $user->email }}</dd>
                    <dt>Usia</dt>
                    <dd>{{ $user->usia }}</dd>
                    <dt>Berat Badan</dt>
                    <dd>{{ $user->berat_badan }}</dd>
                    <dt>Tinggi Badan</dt>
                    <dd>{{ $user->tinggi_badan }}</dd>
                </dl>
            </div>
        </div>
    </div>
</div>
@endsection

