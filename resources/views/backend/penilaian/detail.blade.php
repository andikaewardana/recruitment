@extends('backend.layout.base')

@section('content')
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Detail Penilaian</h1>
            <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item active" aria-current="page">Detail Penilaian</li>
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
        <h3 class="block-title">Tabel Pelamar</h3>
        <div class="block-options">
            <div class="block-options-item">
                <!-- <a href="{{ route('penilaian.create') }}" class="btn btn-success me-1 mb-3">
                    <i class="fa fa-fw fa-plus me-1"></i> Tambah Penilaian
                </a> -->
            </div>
        </div>
    </div>
    <div class="block-content">
        <table class="table table-striped table-vcenter data-table">
            <thead>
                <tr>
                <th class="text-center" style="width: 50px;">No</th>
                <th>Nama Pelamar</th>
                <th>Data Pelamar</th>
                <th>Pendidikan</th>
                <th>Pengalaman Kerja</th>
                <th>Seleksi Wawancara</th>
                <th>Test Skill</th>
                <th>Seleksi Psikotest</th>
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
                ajax: {
                    url: "{{ route('penilaian.show', <?=$id?>) }}",
                    // type: "POST",
                    data: function (d) {
                        d.id = <?=$id?>;
                    }
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                    {data: 'nama_pelamar', name: 'nama_pelamar'},
                    {data: 'data_pelamar',
                        render: function (data, type, row, meta) {
                            if (row.data_pelamar == '1,0') {
                                return "Sangat Baik";
                            } else if (row.data_pelamar == '0,8') {
                                return "Baik";
                            } else if (row.data_pelamar == '0,6') {
                                return "Cukup Baik";
                            } else if (row.data_pelamar == '0,4') {
                                return "Buruk";
                            } else if (row.data_pelamar == '0,2') {
                                return "Sangat Buruk";
                            }
                        }
                    },
                    {data: 'pendidikan',
                        render: function (data, type, row, meta) {
                            if (row.pendidikan == '1,0') {
                                return "Sangat Baik";
                            } else if (row.pendidikan == '0,8') {
                                return "Baik";
                            } else if (row.pendidikan == '0,6') {
                                return "Cukup Baik";
                            } else if (row.pendidikan == '0,4') {
                                return "Buruk";
                            } else if (row.pendidikan == '0,2') {
                                return "Sangat Buruk";
                            }
                        }
                    },
                    {data: 'pengalaman_kerja',
                        render: function (data, type, row, meta) {
                            if (row.pengalaman_kerja == '1,0') {
                                return "Sangat Baik";
                            } else if (row.pengalaman_kerja == '0,8') {
                                return "Baik";
                            } else if (row.pengalaman_kerja == '0,6') {
                                return "Cukup Baik";
                            } else if (row.pengalaman_kerja == '0,4') {
                                return "Buruk";
                            } else if (row.pengalaman_kerja == '0,2') {
                                return "Sangat Buruk";
                            }
                        }
                    },
                    {data: 'wawancara',
                        render: function (data, type, row, meta) {
                            if (row.wawancara == '1,0') {
                                return "Sangat Baik";
                            } else if (row.wawancara == '0,8') {
                                return "Baik";
                            } else if (row.wawancara == '0,6') {
                                return "Cukup Baik";
                            } else if (row.wawancara == '0,4') {
                                return "Buruk";
                            } else if (row.wawancara == '0,2') {
                                return "Sangat Buruk";
                            }
                        }
                    },
                    {data: 'test_skill',
                        render: function (data, type, row, meta) {
                            if (row.test_skill == '1,0') {
                                return "Sangat Baik";
                            } else if (row.test_skill == '0,8') {
                                return "Baik";
                            } else if (row.test_skill == '0,6') {
                                return "Cukup Baik";
                            } else if (row.test_skill == '0,4') {
                                return "Buruk";
                            } else if (row.test_skill == '0,2') {
                                return "Sangat Buruk";
                            }
                        }
                    },
                    {data: 'psikotest',
                        render: function (data, type, row, meta) {
                            if (row.psikotest == '1,0') {
                                return "Sangat Baik";
                            } else if (row.psikotest == '0,8') {
                                return "Baik";
                            } else if (row.psikotest == '0,6') {
                                return "Cukup Baik";
                            } else if (row.psikotest == '0,4') {
                                return "Buruk";
                            } else if (row.psikotest == '0,2') {
                                return "Sangat Buruk";
                            }
                        }
                    },
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
                
        });
    </script>
@endsection
