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

<div class="row">
    <div class="columns large-6">
        <form>
            <div class="grid-container">
                <div class="grid-x grid-padding-x">
                <div class="medium-12 cell">
                    <label>Input Label
                    <input type="text" placeholder=".medium-6.cell">
                    </label>
                </div>
                <div class="medium-12 cell">
                    <label>Input Label
                    <input type="text" placeholder=".medium-6.cell">
                    </label>
                </div>
                </div>
            </div>
        </form>
    </div>
    <div class="columns large-6">
        <form>
            <div class="grid-container">
                <div class="grid-x grid-padding-x">
                <div class="medium-12 cell">
                    <label>Input Label
                    <input type="text" placeholder=".medium-6.cell">
                    </label>
                </div>
                <div class="medium-12 cell">
                    <label>Input Label
                    <input type="text" placeholder=".medium-6.cell">
                    </label>
                </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

