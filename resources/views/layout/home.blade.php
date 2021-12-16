@extends('layout.template')

@section('content')
<div class="content">
    <h2 class="display-4">Selamat Datang Di Website Pencatatan Penduduk</h2>
    @if (auth()->user()->level==1)
        <h3>Anda Admin</h3>
    @elseif (auth()->user()->level==2)
    <h3 class="display-4">NIK :{{ Auth::user()->nik }}</h3>
    @endif
    <blockquote class="blockquote">
        <p class="mb-0">Untuk mekanisme Website ini yaitu:</p>
        <footer class="blockquote-footer">Melakukan isi data diri pada bagian<cite title="Source Title">Penduduk</cite></footer>
        <footer class="blockquote-footer">Setelah itu melakukan isi data diri pada bagian<cite title="Source Title">Wilayah</cite></footer>
      </blockquote>
  </div>

@endsection
