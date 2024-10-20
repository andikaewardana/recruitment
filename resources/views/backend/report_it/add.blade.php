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

<form method="POST" action="{{ route('report.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Tambah Report</h3>
            <div class="block-options">
                <button type="button" class="btn-block-option">
                <i class="si si-settings"></i>
                </button>
            </div>
        </div>
        <div class="block-content">
            <div class="row justify-content-center py-sm-3 py-md-5">
                <div class="col-sm-10 col-md-8">
                    <div class="row mb-4">
                      <div class="col-6">
                        <label class="form-label" for="block-form7-username">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal">
                      </div>
                      <div class="col-6">
                        <label class="form-label" for="block-form7-username">Jenis</label>
                        <select name="jenis" class="form-select">
                            <option selected>Pilih Jenis</option>
                            <option value="hardware">Hardware</option>
                            <option value="software">Software</option>
                        </select>
                      </div>
                    </div>

                    <div class="row mb-4">
                      <div class="col-6">
                        <label class="form-label" for="block-form7-username">Masalah</label>
                        <textarea class="form-control" name="masalah"></textarea>
                      </div>
                      <div class="col-6">
                        <label class="form-label" for="block-form7-username">Uraian Permasalahan</label>
                        <textarea class="form-control" name="uraian-permasalahan"></textarea>
                      </div>
                    </div>

                    <div class="row mb-4">
                      <div class="col-6">
                        <label class="form-label" for="block-form7-username">Solusi</label>
                        <textarea class="form-control" name="solusi"></textarea>
                      </div>
                      <div class="col-6">
                        <label class="form-label" for="block-form7-username">Keterangan</label>
                        <textarea class="form-control" name="keterangan"></textarea>
                      </div>
                    </div>

                    <div class="row mb-4">
                      <div class="col-4">
                        <label class="form-label" for="block-form7-username">User</label>
                        <input type="text" class="form-control" name="user">
                      </div>
                      <div class="col-4">
                        <label class="form-label" for="block-form7-username">Status</label>
                        <select name="status" class="form-select">
                            <option selected>Pilih Status</option>
                            <option value="1">Selesai</option>
                            <option value="2">Belum Selesai</option>
                        </select>
                      </div>
                      <div class="col-4">
                        <label class="form-label">Engineer</label>
                        <select class="select2-multiple form-control" name="engineer[]" multiple="multiple">
                            @foreach ($engineer as $value)
                                <option value="{{ $value->name }}">{{ $value->name }}</option> 
                            @endforeach
                        </select>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="block-content block-content-full block-content-sm bg-body-light">
            <button type="submit" class="btn btn-sm btn-alt-primary">
                <i class="fa fa-check opacity-50 me-1"></i> Submit
            </button>
            <button type="submit" class="btn btn-sm btn-alt-danger">
                <i class="fa fa-xmark opacity-50 me-1"></i> Cancel
            </button>
            <button type="reset" class="btn btn-sm btn-alt-secondary">
                <i class="fa fa-sync-alt opacity-50 me-1"></i> Reset
            </button>
        </div>
    </div>
</form>

</div>
<!-- END Page Content -->

@endsection

@section('scriptBottom')


    <script src="{{ asset('assets/js/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.select2-multiple').select2({
                placeholder: "Select",
                allowClear: true
            });

        });
    </script>


@endsection
