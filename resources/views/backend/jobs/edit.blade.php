@extends('backend.layout.base')

@section('content')
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Jobs</h1>
            <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item active" aria-current="page">Jobs</li>
            </ol>
            </nav>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content">

<form method="POST" action="{{ route('jobs.update', $data->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Edit Jobs</h3>
            <div class="block-options">
                <button type="button" class="btn-block-option">
                <i class="si si-settings"></i>
                </button>
            </div>
        </div>
        <div class="block-content">
            <div class="row justify-content-center py-sm-3 py-md-5">
                <div class="col-sm-10 col-md-8">
                    <div class="mb-4">
                        <label class="form-label" for="block-form7-username">Nama Jobs</label>
                        <input type="text" class="form-control form-control-alt" name="nama" value="{{ $data->nama }}" placeholder="Masukan Nama Jobs...">
                    </div>
                </div>
            </div>
        </div>
        <div class="block-content block-content-full block-content-sm bg-body-light">
            <button type="submit" class="btn btn-sm btn-alt-primary">
                <i class="fa fa-check opacity-50 me-1"></i> Submit
            </button>
            <a href="{{ route('jobs.index') }}" class="btn btn-sm btn-alt-danger">
                <i class="fa fa-xmark opacity-50 me-1"></i> Cancel
            </a>
            <button type="reset" class="btn btn-sm btn-alt-secondary">
                <i class="fa fa-sync-alt opacity-50 me-1"></i> Reset
            </button>
        </div>
    </div>
</form>

</div>
<!-- END Page Content -->

@endsection
