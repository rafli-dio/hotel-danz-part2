<!-- edit modal -->
@foreach($tamu as $tamus)
<div class="modal fade" id="editTamuModal{{ $tamus->id }}" tabindex="-1" aria-labelledby="editTamuModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editTamuModallLabel">Edit Akun Tamu</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('update-tamu', $tamus->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <!-- Nama Panjang -->
          <div class="mb-3">
            <label for="nama_panjang" class="form-label">Nama Panjang</label>
            <input type="text" class="form-control" id="nama_panjang" name="nama_panjang" value="{{$tamus->nama_panjang}}" required>
          </div>
          <!-- Email -->
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" value="{{$tamus->email}}" required>
          </div>
          <!-- Alamat -->
          <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="{{$tamus->alamat}}" required>
          </div>
          <!-- Nomor Telepon -->
          <div class="mb-3">
            <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
            <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" value="{{$tamus->nomor_telepon}}" required>
          </div>
          <!-- Password -->
          <div class="mb-3">
              <label for="password" class="form-label">Password Baru</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Kosongkan jika tidak ingin mengganti password">
          </div>

          <!-- Konfirmasi Password Baru -->
          <div class="mb-3">
              <label for="password_confirmation" class="form-label">Konfirmasi Password Baru</label>
              <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Masukkan ulang password baru">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Perbarui Data</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach
<!-- end edit modal -->

@extends('components-admin.app')
@section('title-user','Admin')
@section('title-header','Admin')
@section('title','Data Akun Tamu')
@section('main')
<div class="col-12 col-md-6 col-lg-12">
  <div class="card">
    <div class="card-body p-0">
      <div class="table-responsive">
      <table id="dataTable" class="table table-striped table-md text-center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Tamu</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Nomor Telepon</th>
                    <th>Password</th>
                    <th style="text-align:center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tamu as $index => $tamus)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $tamus->nama_panjang}}</td>
                    <td>{{ $tamus->email}}</td>
                    <td>{{ $tamus->alamat}}</td>
                    <td>{{ $tamus->nomor_telepon}}</td>
                    <td>{{ str_repeat('*', 8) }}</td>
                    <td style="text-align:center">
                        <button class="btn btn-warning" style="width:100px" data-toggle="modal" data-target="#editTamuModal{{ $tamus->id }}">
                            <i class="far fa-edit mr-3"></i>Edit
                        </button>
                        <form action="{{ route('delete-tamu', $tamus->id) }}" method="POST" class="d-inline">
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
                    <td colspan="6" class="text-center">Tidak ada data tamu.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection