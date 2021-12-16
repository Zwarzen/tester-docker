@extends('layout.template')

@section('content')
<div class="content">
    <h2>Surat Keterangan</h2>
    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title ">Surat Keterangan Tinggal Sementara(SKTS)</h4>
        </div>
        <div class="card-body">
            <h6>jkdbakjbcekfugabcka</h6>
        </div>
        <a href="/surat/cetakSKTS" target="_blank" class="btn btn-primary btn-round">Cetak SKTS</a>
    </div><br>
    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title ">Surat Keterangan Domisili Sementara (SKDS)</h4>
        </div>
        <div class="card-body">
            <h6>jkdbakjbcekfugabcka</h6>
        </div>
        {{-- <div class="form-group">
            <button class="btn btn-primary btn-round">Simpan</button>
        </div> --}}
        <a href="/surat/cetakSKDS" target="_blank" class="btn btn-primary btn-round">Cetak SKDS</a>
    </div>
</div>

@endsection
