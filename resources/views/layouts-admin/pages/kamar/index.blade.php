<div class="modal fade" id="tambahKamarModal" tabindex="-1" aria-labelledby="tambahKamarModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahKamarModalLabel">Tambah Kamar</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('save-kamar') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="nomor_kamar" class="form-label">Nomor Kamarr</label>
            <input type="text" class="form-control" id="nomor_kamar" name="nomor_kamar" required>
          </div>
          <div class="mb-3">
                <label for="tipe_kamar_id" class="form-label">Tipe Kamar</label>
                <select class="form-control" id="tipe_kamar_id" name="tipe_kamar_id" required>
                    <option value="" disabled selected>Pilih Tipe Kamar</option>
                    @foreach($tipekamar as $tipekamars)
                        <option value="{{ $tipekamars->id }}">
                            {{ $tipekamars->nama_tipe_kamar}}
                        </option>
                    @endforeach
                </select>
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

<!-- edit modal -->
@foreach($kamar as $kamars)
<div class="modal fade" id="editKamarModal{{ $kamars->id }}" tabindex="-1" aria-labelledby="editKamarModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editKamarModalLabel">Edit Kamar</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('update-kamar', $kamars->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <!-- Nomor Kamar -->
          <div class="mb-3">
            <label for="nomor_kamar" class="form-label">Nomor Kamar</label>
            <input type="text" class="form-control" id="nomor_kamar" name="nomor_kamar" value="{{$kamars->nomor_kamar}}" required>
          </div>
          <!-- Tipe Kamar -->
          <div class="mb-3">
              <label for="tipe_kamar_id" class="form-label">Tipe Kamar</label>
              <select class="form-control" id="tipe_kamar_id" name="tipe_kamar_id" required>
                  @foreach ($tipekamar as $tipekamars)
                      <option value="{{ $tipekamars->id }}" 
                          {{ $tipekamars->id == $kamars->tipe_kamar_id ? 'selected' : '' }}>
                          {{ $tipekamars->nama_tipe_kamar }}
                      </option>
                  @endforeach
              </select>
          </div>
          <!-- Status Tersedia -->
          <div class="mb-3">
              <label for="status_tersedia" class="form-label">Status Tersedia</label>
              <select class="form-control" id="status_tersedia" name="status_tersedia" required>
                  <option value="1" {{ $kamars->status_tersedia == 1 ? 'selected' : '' }}>Tersedia</option>
                  <option value="0" {{ $kamars->status_tersedia == 0 ? 'selected' : '' }}>Tidak Tersedia</option>
              </select>
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
@section('title','Kamar')
@section('main')
<div class="col-12 col-md-6 col-lg-12">
  <div class="card">
    <div class="card-header justify-content-end">
      <!-- Button to Open Modal -->
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahKamarModal">
        Tambah Kamar
      </button>
    </div>
    <div class="card-body p-0">
      <div class="table-responsive">
      <table class="table table-striped table-md">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No Kamarr</th>
                    <th>Tipe Kamarr</th>
                    <th>Status</th>
                    <th style="text-align:center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($kamar as $index => $kamars)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $kamars->nomor_kamar }}</td>
                    <td>{{ $kamars->tipekamar->nama_tipe_kamar}}</td>
                    <td>
                        @if($kamars->status_tersedia)
                            <span class="badge badge-success" style="width:150px">
                                Tersedia
                            </span>
                        @else
                            <span class="badge badge-danger" style="width:150px">
                                Tidak Tersedia
                            </span>
                        @endif
                    </td>
                    <td style="text-align:center">
                        <button class="btn btn-warning" style="width:100px" data-toggle="modal" data-target="#editKamarModal{{ $kamars->id }}">
                            <i class="far fa-edit mr-3"></i>Edit
                        </button>
                        <form action="{{ route('delete-kamar', $kamars->id) }}" method="POST" class="d-inline">
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
                    <td colspan="6" class="text-center">Tidak ada data tipe kamar.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection