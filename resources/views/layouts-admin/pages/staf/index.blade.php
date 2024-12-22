<div class="modal fade" id="tambahStafModal" tabindex="-1" aria-labelledby="tambahStafModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahStafModalLabel">Tambah Staf</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('save-staf') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="name" class="form-label">Nama Staf</label>
            <input type="text" class="form-control" id="name" name="name" required>
          </div>

          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <input type="hidden" name="role" value="staf">
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
          <div class="mb-3">
            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Tambah Data</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@foreach($staf as $stafs)
<div class="modal fade" id="editStafModal{{ $stafs->id }}" tabindex="-1" aria-labelledby="editStafModalLabel{{ $stafs->id }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editStafModalLabel{{ $stafs->id }}">Edit Staf</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('update-staf', $stafs->id) }}" method="POST">
          @csrf
          @method('PUT') 
          <div class="mb-3">
            <label for="name" class="form-label">Nama Staf</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $stafs->name }}" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $stafs->email }}" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password (Opsional)</label>
            <input type="password" class="form-control" id="password" name="password">
          </div>
          <div class="mb-3">
            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach

@extends('components-admin.app')
@section('title-header','Admin')
@section('title-user','Admin')
@section('title','Data Staf')
@section('main')
<div class="col-12 col-md-6 col-lg-12">
  <div class="card">
  <div class="card-header justify-content-end">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahStafModal">
        Tambah Staf
      </button>
    </div>
    <div class="card-body p-0">
      <div class="table-responsive">
      <table id="dataTable" class="table table-striped table-md">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Staf</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Password</th>
                    <th style="text-align:center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($staf as $index => $stafs)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $stafs->name}}</td>
                    <td>{{ $stafs->email}}</td>
                    <td>{{ $stafs->role}}</td>
                    <td>{{ str_repeat('*', 8) }}</td>
                    <td style="text-align:center">
                        <button class="btn btn-warning" style="width:100px" data-toggle="modal" data-target="#editStafModal{{ $stafs->id }}">
                            <i class="far fa-edit mr-3"></i>Edit
                        </button>
                        <form action="{{ route('delete-staf', $stafs->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" style="width:100px" onclick="return confirm('Apakah Anda yakin ingin menghapus tipe kamar ini?')">
                                <i class="far fa-trash-alt mr-2"></i>Hapus
                            </button>
                        </form>

                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Tidak ada data staf.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection