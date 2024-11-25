@extends('components-admin.app')
@section('title','Data Akun Tamu')
@section('main')
<div class="col-12 col-md-6 col-lg-12">
  <div class="card">
    <div class="card-body p-0">
      <div class="table-responsive">
      <table class="table table-striped table-md">
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
                        <button class="btn btn-warning" style="width:100px" data-toggle="modal" data-target="#">
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