@extends('layout.template')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            {{-- PESAN --}}
            @if (session('pesan'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Sucsess!</h4>
                    {{session('pesan')}}.
                </div>
            @endif
            <td>
                @if (auth()->user()->level==2)
                <a href="/wilayah/add" class="btn btn-outline-primary">Tambah</a>
                @endif
            </td>
            {{-- search --}}
            <form action="/wilayah/cari" method="GET">
                <input type="text" name="cari" placeholder="Cari Wilayah .." value="{{ old('cari') }}" class="btn btn-outline-primary btn-sm">
                <input type="submit" value="CARI" class="btn btn-primary btn-sm">
            </form>

            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">WILAYAH</h4>
                    {{-- <p class="card-category"> Here is a subtitle for this table</p> --}}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                              <th>
                                No
                              </th>
                              <th>
                                Nama
                              </th>
                              <th>
                                Nama Daerah
                              </th>
                              <th>
                                Alamat
                              </th>
                              <th>
                                Kelurahan
                              </th>
                              <th>
                                Kecamatan
                              </th>
                              <th>
                                Alasan
                              </th>
                              <th>
                                Tanggal
                              </th>
                              <th>
                                Action
                              </th>
                            </thead>
                            <tbody>
                                <?php $no=1; ?>
                                @foreach ($wilayah as $data)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $data->nama }}</td>
                                        <td>{{ $data->nama_daerah }}</td>
                                        <td>{{ $data->alamat }}</td>
                                        <td>{{ $data->kelurahan }}</td>
                                        <td>{{ $data->kecamatan }}</td>
                                        <td>{{ $data->alasan }}</td>
                                        <td>{{ $data->tanggal }}</td>
                                        <td>
                                            <a href="/wilayah/edit/{{ $data->id_region }}" class="btn btn-sm btn-warning">EDIT</a>
                                            @if (auth()->user()->level==1)
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $data->id_region }}">
                                                DELETE
                                            </button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                            {{-- delete notif --}}
                            @foreach ($wilayah as $data)
                            <div class="modal modal-danger fade" id="delete{{ $data->id_region }}">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">PERINGATAN!!</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Yakin menghapus data {{ $data->nama }} ?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">NO</button>
                                            <a href="/wilayah/delete/{{ $data->id_region }}" class="btn btn-outline">YES</a>
                                        </div>
                                    </div>
                                        <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
