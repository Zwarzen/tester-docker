@extends('layout.template')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Data Wilayah</h4>
                        </div>
                        <div class="card-body">

                            <form action="/wilayah/update/{{$wilayah->id_region}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                {{-- <div class="form-grup">
                                    <label>NAMA PENDUDUK</label>
                                    <input name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{$wilayah->nama}}" readonly>
                                    <option value="">Pilih Penduduk</option>
                                    @foreach ($penduduk as $data)
                                        <option value="{{$data->nik}}">{{$data->nama}} - {{$data->nik}}</option>
                                    @endforeach
                                    <div class="text-danger">
                                        @error('nama')
                                            Nama Salah/Kosong
                                        @enderror
                                    </div>
                                </div> --}}
                                <div class="form-grup">
                                    <label>NAMA DAERAH</label>
                                    <input name="nama_daerah" class="form-control @error('nama_daerah') is-invalid @enderror" value="{{$wilayah->nama_daerah}}">
                                    <div class="text-danger">
                                        @error('nama_daerah')
                                            Nama Daerah Salah/Kosong
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-grup">
                                    <label>ALAMAT</label>
                                    <input name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{$wilayah->alamat}}">
                                    <div class="text-danger">
                                        @error('alamat')
                                            Alamat Salah/Kosong
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-grup">
                                    <label>KELURAHAN</label>
                                    <input name="kelurahan" class="form-control @error('kelurahan') is-invalid @enderror" value="{{$wilayah->kelurahan}}">
                                    <div class="text-danger">
                                        @error('kelurahan')
                                            Kelurahan Salah/Kosong
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-grup">
                                    <label>KECAMATAN</label>
                                    <input name="kecamatan" class="form-control @error('kecamatan') is-invalid @enderror" value="{{$wilayah->kecamatan}}">
                                    <div class="text-danger">
                                        @error('kecamatan')
                                            Kecamatan Salah/Kosong
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-grup">
                                    <label>ALASAN</label>
                                    <input name="alasan" class="form-control @error('alasan') is-invalid @enderror" value="{{$wilayah->alasan}}">
                                    <div class="text-danger">
                                        @error('alasan')
                                            Alasan Salah/Kosong
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-grup">
                                    <label>TANGGAL</label>
                                    <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{$wilayah->tanggal}}">
                                    <div class="text-danger">
                                        @error('tanggal')
                                            Tanggal Salah/Kosong
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary pull-right">Simpan</button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
