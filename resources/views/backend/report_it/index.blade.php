@extends('backend.layout.base')

@section('content')
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Report IT</h1>
            <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item active" aria-current="page">Report IT</li>
            </ol>
            </nav>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content">

<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">Tabel Report IT</h3>
        <div class="block-options">
            <div class="block-options-item">
                <a href="{{ route('report.create') }}" class="btn btn-success me-1 mb-3">
                    <i class="fa fa-fw fa-plus me-1"></i> Tambah Report
                </a>
            </div>
        </div>
    </div>
    <div class="block-content">
        <table class="table table-striped table-vcenter data-table">
            <thead>
                <tr>
                <th class="text-center" style="width: 50px;">No</th>
                <th>Tanggal</th>
                <th>Jenis</th>
                <th>Masalah</th>
                <th>User</th>
                <th>Status</th>
                <th>Engineer</th>
                <th class="text-center" style="width: 100px;">Actions</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

</div>
<!-- END Page Content -->

@endsection

@section('scriptBottom')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(function () {
            
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('report.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                    {data: 'tanggal', name: 'tanggal'},
                    {data: 'jenis', name: 'jenis'},
                    {data: 'masalah', name: 'masalah'},
                    {data: 'user', name: 'user'},
                    {data: null,
                        render: function (data, type, row, meta) {
                            if (row.status == 1) {
                                return "<button type='button' class='btn btn-success'>Selesai</button>";
                            } else {
                                return "<button type='button' class='btn btn-success'>Belum Selesai</button>";
                            }
                        }
                    },
                    {data: 'engineer', name: 'engineer'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
                
        });
    </script>
@endsection
