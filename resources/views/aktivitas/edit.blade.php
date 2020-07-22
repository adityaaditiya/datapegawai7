@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card mx-auto" style="width: 60rem">
        <div class="card-body">
            <form action="{{ route('aktivitas.update', $aktivitass->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <input type="hidden" name="_method" value="PUT">

                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                <div class="form-group">
                    <label for="">Kode</label>
                    <input type="text" name="kode_id" class="form-control @error('kode_id') is-invalid @enderror" id="kode_id"
                        value="{{$aktivitass->kode_id}}">
                    @error('kode_id')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama"
                        value="{{$aktivitass->nama}}">
                    @error('nama')
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

                @if ($aktivitass->photo != NULL)
                    <img src="{{ asset('storage/'.$aktivitass->photo) }}" width="200" alt="">
                @else
                    Tidak ada Foto!
                @endif
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
                    @if ($aktivitass->file != NULL)
                    <a href="{{asset('storage/'.$aktivitass->file)}}" target="_blank">Lihat PDF</a>
                    @else
                    Tidak ada PDF!
                @endif
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
