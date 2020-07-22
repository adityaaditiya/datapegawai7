@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card mx-auto" style="width: 60rem">
        <div class="card-body">
            <form action="{{ route('pegawai.update', $pegawais->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="_method" value="PUT">

                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama"
                        value="{{$pegawais->nama}}">
                    @error('nama')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Alamat</label>
                    <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror"
                        id="alamat" value="{{$pegawais->alamat}}">
                    @error('alamat')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Jenis</label>
                    <div class="row">
                        <div class="col-md-4">
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                <option value="Laki-laki"
                                    {{ $pegawais->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan"
                                    {{ $pegawais->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
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
                                id="tempat" value="{{$pegawais->tempat}}">
                            @error('tempat')
                            <span>{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="col-md-4">
                            <input type="date" name="tanggal"
                                class="form-control @error('tanggal') is-invalid @enderror" id="tanggal"
                                value="{{$pegawais->tanggal}}">
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
                                <option value="Sekertaris" {{ $pegawais->jabatan == 'Sekertaris' ? 'selected' : '' }}>
                                    Sekertaris</option>
                                <option value="Kepala Bidang"
                                    {{ $pegawais->jabatan == 'Kepala Bidang' ? 'selected' : '' }}>Kepala Bidang</option>
                                <option value="Bendahara" {{ $pegawais->jabatan == 'Bendahara' ? 'selected' : '' }}>
                                    Bendahara</option>
                                <option value="Staff" {{ $pegawais->jabatan == 'Staff' ? 'selected' : '' }}>Staff
                                </option>
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
                                <option value="Menikah" {{ $pegawais->status_menikah == 'Menikah' ? 'selected' : '' }}>
                                    Menikah</option>
                                <option value="Belum Menikah"
                                    {{ $pegawais->status_menikah == 'Belum Menikah' ? 'selected' : '' }}>Belum Menikah
                                </option>
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
                                <option value="Islam" {{ $pegawais->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
                                <option value="Katolik" {{ $pegawais->agama == 'Katolik' ? 'selected' : '' }}>Katolik
                                </option>
                                <option value="Kristen" {{ $pegawais->agama == 'Kristen' ? 'selected' : '' }}>Kristen
                                </option>
                                <option value="Budha" {{ $pegawais->agama == 'Budha' ? 'selected' : '' }}>Budha</option>
                                <option value="Hindu" {{ $pegawais->agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                            </select>
                        </div>
                    </div>
                    @error('agama')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Foto</label>
                    @if ($pegawais->photo != NULL)
                    <img src="{{ asset('storage/'.$pegawais->photo) }}" width="200" alt="">
                    @else
                    Tidak ada Foto!
                    @endif
                    @error('foto')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">PDF</label>
                    @if ($pegawais->file != NULL)
                    <a href="{{asset('storage/'.$pegawais->file)}}">Lihat File</a>
                    @else
                    Tidak ada Foto!
                    @endif
                    @error('pdf')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <a href="{{ route('home')}}" class="btn btn-primary">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
