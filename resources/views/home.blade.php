@extends('layouts.app')

@section('content')
<div class="container">
    <span>
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        {{ __('Selamat Datang !') }}
    </span>

    <div class="card">
        <div class="card-header">{{ __('Data Pegawai') }}
        <a href="{{route('pegawai.create')}}" class="btn btn-primary btn-sm float-right">Tambah</a>
        </div>

        <div class="card-body">
            <table class="table table-hover table-stripped table-pegawai">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Nama</td>
                        <td>Alamat</td>
                        <td>Jabatan</td>
                        <td>Opsi</td>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        var table = $('.table-pegawai').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            pageLength: 10,
            "order": [
                [0, "desc"]
            ],
            ajax: "{{ route('pegawai.list') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'alamat',
                    name: 'alamat'
                },
                {
                    data: 'jabatan',
                    name: 'jabatan'
                },
                {
                    data: 'Actions',
                    name: 'Actions',
                    orderable: false,
                    searchable: false,
                    sClass: 'text-center'
                },
            ]
        });
    });

    function deleteRow(id){
        confirm('Are you sure you want to delete?')
        
    }

</script>
@endsection
