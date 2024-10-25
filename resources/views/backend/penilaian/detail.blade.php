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
        <!-- <a href="#" class="btn btn-primary"></a> -->
        <div class="block-options">
            <div class="block-options-item">
                <a href="javascript:;" class="btn btn-success me-1 mb-3" id="kalkulasiPenilaian">
                    <i class="fa fa-fw fa-plus me-1"></i> Kalkulasi Penilaian
                </a>
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

<!-- Modal -->
<div class="modal fade" id="modalPenilaian" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('penilaian.update', $id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <div class="modal-body">
                    <input type="hidden" name="id_penilaian" id="idPenilaian">
                    <div class="mb-4">
                        <label class="mb-2">1. Data Pelamar</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="data_pelamar" value="1.0" id="dataPelamar1">
                            <label class="form-check-label" for="dataPelamar1">
                                Sangat Baik
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="data_pelamar" value="0.8" id="dataPelamar2">
                            <label class="form-check-label" for="dataPelamar2">
                                Baik
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="data_pelamar" value="0.6" id="dataPelamar3">
                            <label class="form-check-label" for="dataPelamar3">
                                Cukup Baik
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="data_pelamar" value="0.4" id="dataPelamar4">
                            <label class="form-check-label" for="dataPelamar4">
                                Kurang Baik
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="data_pelamar" value="0.2" id="dataPelamar5">
                            <label class="form-check-label" for="dataPelamar5">
                                Sangat Kurang Baik
                            </label>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="mb-2">2. Pendidikan</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pendidikan" value="1.0" id="pendidikan1">
                            <label class="form-check-label" for="pendidikan1">
                                Sangat Baik
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pendidikan" value="0.8" id="pendidikan2">
                            <label class="form-check-label" for="pendidikan2">
                                Baik
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pendidikan" value="0.6" id="pendidikan3">
                            <label class="form-check-label" for="pendidikan3">
                                Cukup Baik
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pendidikan" value="0.4" id="pendidikan4">
                            <label class="form-check-label" for="pendidikan4">
                                Kurang Baik
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pendidikan" value="0.2" id="pendidikan5">
                            <label class="form-check-label" for="pendidikan5">
                                Sangat Kurang Baik
                            </label>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="mb-2">3. Pengalaman Kerja</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pengalaman_kerja" value="1.0" id="pengalamanKerja1">
                            <label class="form-check-label" for="pengalamanKerja1">
                                Sangat Baik
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pengalaman_kerja" value="0.8" id="pengalamanKerja2">
                            <label class="form-check-label" for="pengalamanKerja2">
                                Baik
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pengalaman_kerja" value="0.6" id="pengalamanKerja3">
                            <label class="form-check-label" for="pengalamanKerja3">
                                Cukup Baik
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pengalaman_kerja" value="0.4" id="pengalamanKerja4">
                            <label class="form-check-label" for="pengalamanKerja4">
                                Kurang Baik
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pengalaman_kerja" value="0.2" id="pengalamanKerja5">
                            <label class="form-check-label" for="pengalamanKerja5">
                                Sangat Kurang Baik
                            </label>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="mb-2">4. Seleksi Wawancara</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="seleksi_wawancara" value="1.0" id="seleksiWawancara1">
                            <label class="form-check-label" for="seleksiWawancara1">
                                Sangat Baik
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="seleksi_wawancara" value="0.8" id="seleksiWawancara2">
                            <label class="form-check-label" for="seleksiWawancara2">
                                Baik
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="seleksi_wawancara" value="0.6" id="seleksiWawancara3">
                            <label class="form-check-label" for="seleksiWawancara3">
                                Cukup Baik
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="seleksi_wawancara" value="0.4" id="seleksiWawancara4">
                            <label class="form-check-label" for="seleksiWawancara4">
                                Kurang Baik
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="seleksi_wawancara" value="0.2" id="seleksiWawancara5">
                            <label class="form-check-label" for="seleksiWawancara5">
                                Sangat Kurang Baik
                            </label>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="mb-2">5. Test Skill</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="test_skill" value="1.0" id="testSkill1">
                            <label class="form-check-label" for="testSkill1">
                                Sangat Baik
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="test_skill" value="0.8" id="testSkill2">
                            <label class="form-check-label" for="testSkill2">
                                Baik
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="test_skill" value="0.6" id="testSkill3">
                            <label class="form-check-label" for="testSkill3">
                                Cukup Baik
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="test_skill" value="0.4" id="testSkill4">
                            <label class="form-check-label" for="testSkill4">
                                Kurang Baik
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="test_skill" value="0.2" id="testSkill5">
                            <label class="form-check-label" for="testSkill5">
                                Sangat Kurang Baik
                            </label>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="mb-2">6. Seleksi Psikotest</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="seleksi_psikotest" value="1.0" id="seleksiPsikotest1">
                            <label class="form-check-label" for="seleksiPsikotest1">
                                Sangat Baik
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="seleksi_psikotest" value="0.8" id="seleksiPsikotest2">
                            <label class="form-check-label" for="seleksiPsikotest2">
                                Baik
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="seleksi_psikotest" value="0.6" id="seleksiPsikotest3">
                            <label class="form-check-label" for="seleksiPsikotest3">
                                Cukup Baik
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="seleksi_psikotest" value="0.4" id="seleksiPsikotest4">
                            <label class="form-check-label" for="seleksiPsikotest4">
                                Kurang Baik
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="seleksi_psikotest" value="0.2" id="seleksiPsikotest5">
                            <label class="form-check-label" for="seleksiPsikotest5">
                                Sangat Kurang Baik
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Start Modal Modal Detail Pembayaran -->
<div class="modal fade text-start" id="detailCalculate" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Detail Rangking Pelamar</h5>
                <button class="btn-close" type="button"
                    data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Pelamar Terbaik Berdasarkan Nilai Akhir</h3>
                        </div>
                        <div class="block-content">
                            <table id="tabelDetailCalculate" class="table table-bordered table-striped" width="100%">
                            </table>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Pelamar Terbaik Berdasarkan Skill</h3>
                        </div>
                        <div class="block-content">
                            <table id="tabelDetailCalculateSkill" class="table table-bordered table-striped" width="100%">
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Modal Detail Pembayaran -->

</div>
<!-- END Page Content -->

@endsection

@section('scriptBottom')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script>
        var table = '';
        var detailCalculate = null;
        var detailCalculateSkill = null;

        $(function () {
            
            table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('penilaian.show', <?=$id?>) }}",
                    data: function (d) {
                        d.id = <?=$id?>;
                    }
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                    {data: 'nama_pelamar', name: 'nama_pelamar'},
                    {data: 'data_pelamar',
                        render: function (data, type, row, meta) {
                            if (row.data_pelamar == '1.0') {
                                return "Sangat Baik";
                            } else if (row.data_pelamar == '0.8') {
                                return "Baik";
                            } else if (row.data_pelamar == '0.6') {
                                return "Cukup Baik";
                            } else if (row.data_pelamar == '0.4') {
                                return "Kurang Baik";
                            } else if (row.data_pelamar == '0.2') {
                                return "Sangat Kurang Baik";
                            }
                        }
                    },
                    {data: 'pendidikan',
                        render: function (data, type, row, meta) {
                            if (row.pendidikan == '1.0') {
                                return "Sangat Baik";
                            } else if (row.pendidikan == '0.8') {
                                return "Baik";
                            } else if (row.pendidikan == '0.6') {
                                return "Cukup Baik";
                            } else if (row.pendidikan == '0.4') {
                                return "Kurang Baik";
                            } else if (row.pendidikan == '0.2') {
                                return "Sangat Kurang Baik";
                            }
                        }
                    },
                    {data: 'pengalaman_kerja',
                        render: function (data, type, row, meta) {
                            if (row.pengalaman_kerja == '1.0') {
                                return "Sangat Baik";
                            } else if (row.pengalaman_kerja == '0.8') {
                                return "Baik";
                            } else if (row.pengalaman_kerja == '0.6') {
                                return "Cukup Baik";
                            } else if (row.pengalaman_kerja == '0.4') {
                                return "Kurang Baik";
                            } else if (row.pengalaman_kerja == '0.2') {
                                return "Sangat Kurang Baik";
                            }
                        }
                    },
                    {data: 'wawancara',
                        render: function (data, type, row, meta) {
                            if (row.wawancara == '1.0') {
                                return "Sangat Baik";
                            } else if (row.wawancara == '0.8') {
                                return "Baik";
                            } else if (row.wawancara == '0.6') {
                                return "Cukup Baik";
                            } else if (row.wawancara == '0.4') {
                                return "Kurang Baik";
                            } else if (row.wawancara == '0.2') {
                                return "Sangat Kurang Baik";
                            }
                        }
                    },
                    {data: 'test_skill',
                        render: function (data, type, row, meta) {
                            if (row.test_skill == '1.0') {
                                return "Sangat Baik";
                            } else if (row.test_skill == '0.8') {
                                return "Baik";
                            } else if (row.test_skill == '0.6') {
                                return "Cukup Baik";
                            } else if (row.test_skill == '0.4') {
                                return "Kurang Baik";
                            } else if (row.test_skill == '0.2') {
                                return "Sangat Kurang Baik";
                            }
                        }
                    },
                    {data: 'psikotest',
                        render: function (data, type, row, meta) {
                            if (row.psikotest == '1.0') {
                                return "Sangat Baik";
                            } else if (row.psikotest == '0.8') {
                                return "Baik";
                            } else if (row.psikotest == '0.6') {
                                return "Cukup Baik";
                            } else if (row.psikotest == '0.4') {
                                return "Kurang Baik";
                            } else if (row.psikotest == '0.2') {
                                return "Sangat Kurang Baik";
                            }
                        }
                    },
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
            
        });

        var modalPenilaian = function(){

            $('.data-table tbody').on('click', 'tr', function() {
                var tr = $(this).closest('tr');
                var row = table.row(tr).data();

                var dataPelamar = document.getElementsByName('data_pelamar');
                for (var dataPelamar1 of dataPelamar) {
                    if (dataPelamar1.value === row.data_pelamar) {
                        dataPelamar1.checked = true;
                        break;
                    }
                }

                var pendidikan = document.getElementsByName('pendidikan');
                for (var pendidikan1 of pendidikan) {
                    if (pendidikan1.value === row.pendidikan) {
                        pendidikan1.checked = true;
                        break;
                    }
                }

                var pengalamanKerja = document.getElementsByName('pengalaman_kerja');
                for (var pengalamanKerja1 of pengalamanKerja) {
                    if (pengalamanKerja1.value === row.pengalaman_kerja) {
                        pengalamanKerja1.checked = true;
                        break;
                    }
                }

                var seleksiWawancara = document.getElementsByName('seleksi_wawancara');
                for (var seleksiWawancara1 of seleksiWawancara) {
                    if (seleksiWawancara1.value === row.wawancara) {
                        seleksiWawancara1.checked = true;
                        break;
                    }
                }

                var testSkill = document.getElementsByName('test_skill');
                for (var testSkill1 of testSkill) {
                    if (testSkill1.value === row.test_skill) {
                        testSkill1.checked = true;
                        break;
                    }
                }

                var seleksiPsikotest = document.getElementsByName('seleksi_psikotest');
                for (var seleksiPsikotest1 of seleksiPsikotest) {
                    if (seleksiPsikotest1.value === row.psikotest) {
                        seleksiPsikotest1.checked = true;
                        break;
                    }
                }

                $('#exampleModalLabel').html('Edit Data ' + row.nama_pelamar)
                $('#idPenilaian').val(row.id)

            });

            $('#modalPenilaian').modal('show');

        };

        $('#kalkulasiPenilaian').on('click', function(e) {
            e.preventDefault();
            let token   = $("meta[name='csrf-token']").attr("content");
            $.ajax({
                type: "post",
                url: "{{ route('penilaian.calculate') }}",
                data: {
                    id: <?= $id ?>,
                    "_token": token
                },
                success: function (data) {

                    detailCalculate.ajax.reload(null, false);
                    detailCalculateSkill.ajax.reload(null, false);

                    $('#detailCalculate').modal('show');

                },
            });

            detailCalculate = $('#tabelDetailCalculate').DataTable({
                "processing": true,
                dom: 'Bfrtip',
                "ajax": {  
                    "headers": {
                        "_token": token
                    },
                    "data": function (data) {
                        delete data.columns;
                        // Append to data
                        data.id = <?= $id ?>;
                        data._token = token
                    },
                    "url": "{{ route('penilaian.nilai_calculate') }}",
                    "type": "POST"
                },
                // "deferRender": true,
                "aLengthMenu": [
                    [30, 40, 50],
                    [30, 40, 50]
                ],
                "autoWidth": false,
                // "responsive": true,
                "serverside" : true,
                // "scrollX" : true,
                columnDefs: [{
                    "defaultContent": "-",
                    "targets": "_all"
                }],
                "columns": [
                    {
                        "render": function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        },
                        "title": "No",
                    },
                    {
                        "data": "nama_pelamar",
                        "title": "Nama Pelamar",
                    },
                    // {
                    //     "data": "nilai_pembayaran",
                    //     "render": $.fn.dataTable.render.number(',', '.', 2, ''),
                    //     "title": "Nilai Pembayaran",
                    // },
                    // {
                    //     "data": "sisa_pembayaran",
                    //     "render": $.fn.dataTable.render.number(',', '.', 2, ''),
                    //     "title": "Sisa Pembayaran",
                    // },
                    // {
                    //     "data": "tgl_pembayaran",
                    //     "title": "Tanggal Pembayaran",
                    // },
                    // {
                    //     "data": "keterangan",
                    //     "title": "keterangan",
                    // },
                    // {
                    //     "data": "nama_lengkap",
                    //     "title": "Add By",
                    //     "className" : "text-right"
                    // },
                    // {
                    //     "data": "create_at",
                    //     "title": "Add At",
                    //     "className" : "text-center"
                    // }
                ],
                // buttons: [
                //     {
                //         text: '<i class="fa fa-refresh"></i>',
                //         action: () => {
                //             detailCalculate.ajax.reload(null, false);
                //         },
                //         titleAttr: 'Refresh',
                //     },
                // ],
            })

            detailCalculateSkill = $('#tabelDetailCalculateSkill').DataTable({
                "processing": true,
                dom: 'Bfrtip',
                "ajax": {  
                    "headers": {
                        "_token": token
                    },
                    "data": function (data) {
                        delete data.columns;
                        // Append to data
                        data.id = <?= $id ?>;
                        data._token = token
                    },
                    "url": "{{ route('penilaian.skill_calculate') }}",
                    "type": "POST"
                },
                // "deferRender": true,
                "aLengthMenu": [
                    [30, 40, 50],
                    [30, 40, 50]
                ],
                "autoWidth": false,
                // "responsive": true,
                "serverside" : true,
                // "scrollX" : true,
                columnDefs: [{
                    "defaultContent": "-",
                    "targets": "_all"
                }],
                "columns": [
                    {
                        "render": function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        },
                        "title": "No",
                    },
                    {
                        "data": "nama_pelamar",
                        "title": "Nama Pelamar",
                    },
                    // {
                    //     "data": "nilai_pembayaran",
                    //     "render": $.fn.dataTable.render.number(',', '.', 2, ''),
                    //     "title": "Nilai Pembayaran",
                    // },
                    // {
                    //     "data": "sisa_pembayaran",
                    //     "render": $.fn.dataTable.render.number(',', '.', 2, ''),
                    //     "title": "Sisa Pembayaran",
                    // },
                    // {
                    //     "data": "tgl_pembayaran",
                    //     "title": "Tanggal Pembayaran",
                    // },
                    // {
                    //     "data": "keterangan",
                    //     "title": "keterangan",
                    // },
                    // {
                    //     "data": "nama_lengkap",
                    //     "title": "Add By",
                    //     "className" : "text-right"
                    // },
                    // {
                    //     "data": "create_at",
                    //     "title": "Add At",
                    //     "className" : "text-center"
                    // }
                ],
                // buttons: [
                //     {
                //         text: '<i class="fa fa-refresh"></i>',
                //         action: () => {
                //             detailCalculateSkill.ajax.reload(null, false);
                //         },
                //         titleAttr: 'Refresh',
                //     },
                // ],
            })

        });

        $('#detailCalculate').on('hidden.bs.modal', function () {
            $('#detailCalculate').removeData('bs.modal');
            location.reload();
        });

    </script>
@endsection
