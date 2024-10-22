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

<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">Tabel Jobs</h3>
        <div class="block-options">
            <div class="block-options-item">
                <a href="{{ route('jobs.create') }}" class="btn btn-success me-1 mb-3">
                    <i class="fa fa-fw fa-plus me-1"></i> Tambah Jobs
                </a>
            </div>
        </div>
    </div>
    <div class="block-content">
        <table class="table table-striped table-vcenter">
            <thead>
                <tr>
                <th class="text-center" style="width: 50px;">#</th>
                <th>Nama Jobs</th>
                <th class="text-center" style="width: 100px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($data as $jobs)
                <tr>
                    <th class="text-center" scope="row">{{ $no++ }}</th>
                    <td class="fw-semibold">
                        <span>{{ $jobs->nama }}</span>
                    </td>
                    <td class="text-center">
                        <div class="btn-group">
                        <a href="{{ route('jobs.edit', $jobs->id) }}" class="btn btn-sm btn-primary js-bs-tooltip-enabled" data-bs-toggle="tooltip" aria-label="Edit">
                            <i class="fa fa-pencil-alt"></i>
                        </a>
                        <form onsubmit="return confirm('Apakah Anda Yakin?')" action="{{ route('jobs.destroy', $jobs->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger js-bs-tooltip-enabled" data-bs-toggle="tooltip" aria-label="Delete">
                                <i class="fa fa-times"></i>
                            </button>
                        </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

</div>
<!-- END Page Content -->

@endsection