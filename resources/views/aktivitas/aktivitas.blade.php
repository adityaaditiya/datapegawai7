@extends('layouts.app')

@section('content')
<div class="container">
    <span>
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

    </span>

    <div class="card">
        <div class="card-header">{{ __('Data Aktivitas') }}
        <a href="{{route('aktivitas.create')}}" class="btn btn-primary btn-sm float-right">Tambah</a>
        </div>

        <div class="card-body">
            <table class="table table-hover table-stripped table-aktivitas">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Kode</td>
                        <td>Nama</td>
                        <td>Opsi</td>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        var table = $('.table-aktivitas').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            pageLength: 10,
            "order": [
                [0, "desc"]
            ],
            ajax: "{{ route('aktivitas.lis') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'kode_id',
                    name: 'kode_id'
                },
                {
                    data: 'nama',
                    name: 'nama'
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
