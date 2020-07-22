@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card mx-auto" style="width: 60rem">
        <div class="card-body">
            <form action="{{ route('pegawai.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama"
                        value="{{old('nama')}}">
                    @error('nama')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Alamat</label>
                    <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                        value="{{old('alamat')}}">
                    @error('alamat')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Jenis</label>
                    <div class="row">
                        <div class="col-md-4">
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    @error('jenis_kelamin')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Tempat dan Tanggal Lahir</label>
                    <div class="row">
                        <div class="col-md-3">
                            <input type="text" name="tempat" class="form-control @error('tempat') is-invalid @enderror"
                                id="tempat" value="{{old('tempat')}}">
                            @error('tempat')
                            <span>{{ $message }}</span>
                            @enderror
        
                        </div>
                        <div class="col-md-4">
                            <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror"
                                id="tanggal" value="{{old('tanggal')}}">
                            @error('tanggal')
                            <span>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Jabatan</label>
                    <div class="row">
                        <div class="col-md-4">
                            <select name="jabatan" id="jabatan" class="form-control">
                                <option value="Sekertaris">Sekertaris</option>
                                <option value="Kepala Bidang">Kepala Bidang</option>
                                <option value="Bendahara">Bendahara</option>
                                <option value="Staff">Staff</option>
                            </select>
                        </div>
                    </div>
                    @error('jabatan')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Status Menikah</label>
                    <div class="row">
                        <div class="col-md-4">
                            <select name="status_menikah" id="status_menikah" class="form-control">
                                <option value="Menikah">Menikah</option>
                                <option value="Belum Menikah">Belum Menikah</option>
                            </select>
                        </div>
                    </div>
                    @error('status_menikah')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Agama</label>
                    <div class="row">
                        <div class="col-md-3">
                            <select name="agama" id="agama" class="form-control">
                                <option value="Islam">Islam</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Budha">Budha</option>
                                <option value="Hindu">Hindu</option>
                            </select>
                        </div>
                    </div>
                    @error('status_menikah')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Foto</label>
                    <div class="row">
                        <div class="col-md-4">
                            <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" id="foto">
                        </div>
                    </div>
                    @error('foto')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">PDF</label>
                    <div class="row">
                        <div class="col-md-4">
                    <input type="file" name="pdf" class="form-control @error('pdf') is-invalid @enderror" id="pdf">
        
                        </div>
                    </div>
                    @error('pdf')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group ">
                    <button class="btn btn-primary btn-sm btn-block" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
