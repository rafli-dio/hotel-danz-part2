<div class="modal fade" id="tambahTipeKamarModal" tabindex="-1" aria-labelledby="tambahTipeKamarModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahTipeKamarModalLabel">Tambah Tipe Kamar</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('save-tipe-kamar') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="nama_tipe_kamar" class="form-label">Nama Tipe Kamar</label>
            <input type="text" class="form-control" id="nama_tipe_kamar" name="nama_tipe_kamar" required>
          </div>
          <div class="mb-3">
            <label for="harga_kamar" class="form-label">Harga Kamar</label>
            <input type="number" class="form-control" id="harga_kamar" name="harga_kamar" required>
          </div>
          <div class="mb-3">
            <label for="deskripsi_kamar" class="form-label">Deskripsi Kamar</label>
            <textarea class="form-control" id="deskripsi_kamar" name="deskripsi_kamar" rows="3" required></textarea>
          </div>
          <div class="mb-3">
            <label for="kapasitas_kamar" class="form-label">Kapasitas Kamar</label>
            <select class="form-control" id="kapasitas_kamar" name="kapasitas_kamar" required>
              <option value="2">2 Orang</option>
              <option value="4">4 Orang</option>
              <option value="6">6 Orang</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="gambar_kamar" class="form-label">Gambar Kamar</label>
            <input type="file" class="form-control" id="gambar_kamar" name="gambar_kamar" required>
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

<!-- edit form -->
@foreach($tipekamar as $tipe)
<div class="modal fade" id="editTipeKamarModal{{ $tipe->id }}" tabindex="-1" aria-labelledby="editTipeKamarModalLabel{{ $tipe->id }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editTipeKamarModalLabel{{ $tipe->id }}">Edit Tipe Kamar</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('update-tipe-kamar', $tipe->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="mb-3">
            <label for="nama_tipe_kamar" class="form-label">Nama Tipe Kamar</label>
            <input type="text" class="form-control" id="nama_tipe_kamar" name="nama_tipe_kamar" value="{{ $tipe->nama_tipe_kamar }}" required>
          </div>
          <div class="mb-3">
            <label for="harga_kamar" class="form-label">Harga Kamar</label>
            <input type="number" class="form-control" id="harga_kamar" name="harga_kamar" value="{{ $tipe->harga_kamar }}" required>
          </div>
          <div class="mb-3">
            <label for="deskripsi_kamar" class="form-label">Deskripsi Kamar</label>
            <textarea class="form-control" id="deskripsi_kamar" name="deskripsi_kamar" rows="3" required>{{ $tipe->deskripsi_kamar }}</textarea>
          </div>
          <div class="mb-3">
            <label for="kapasitas_kamar" class="form-label">Kapasitas Kamar</label>
            <select class="form-control" id="kapasitas_kamar" name="kapasitas_kamar" required>
              <option value="2" {{ $tipe->kapasitas_kamar == 2 ? 'selected' : '' }}>2 Orang</option>
              <option value="4" {{ $tipe->kapasitas_kamar == 4 ? 'selected' : '' }}>4 Orang</option>
              <option value="6" {{ $tipe->kapasitas_kamar == 6 ? 'selected' : '' }}>6 Orang</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="gambar_kamar" class="form-label">Gambar Kamar</label>
            <input type="file" class="form-control" id="gambar_kamar" name="gambar_kamar">
            <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar.</small>
            <br>
            <!-- Preview Image -->
            <img id="preview{{ $tipe->id }}" src="{{ asset('storage/' . $tipe->gambar_kamar) }}" alt="Pratinjau Gambar" class="img-thumbnail mt-2" style="width: 150px; height: auto;">
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
@section('title','Tipe Kamar')
@section('main')
<div class="col-12 col-md-6 col-lg-12">
  <div class="card">
    <div class="card-header justify-content-end">
      <!-- Button to Open Modal -->
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahTipeKamarModal">
        Tambah Tipe Kamar
      </button>
    </div>
    <div class="card-body p-0">
      <div class="table-responsive">
      <table id="dataTable" class="table table-striped table-md text-center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Tipe Kamar</th>
                    <th>Harga Kamar</th>
                    <th>Deskripsi Kamar</th>
                    <th>Kapasitas Kamar</th>
                    <th>Gambar Kamar</th>
                    <th style="text-align:center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tipekamar as $index => $tipe)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $tipe->nama_tipe_kamar }}</td>
                    <td>{{ number_format($tipe->harga_kamar, 0, ',', '.') }}</td>
                    <td>{{ $tipe->deskripsi_kamar }}</td>
                    <td>{{ $tipe->kapasitas_kamar }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $tipe->gambar_kamar) }}" alt="Gambar Kamar" class="img-thumbnail" style="width: 100px;">
                    </td>
                    <td style="text-align:center">
                        <button class="btn btn-warning" style="width:100px" data-toggle="modal" data-target="#editTipeKamarModal{{ $tipe->id }}">
                            <i class="far fa-edit mr-3"></i>Edit
                        </button>
                        <form action="{{ route('delete-tipe-kamar', $tipe->id) }}" method="POST" class="d-inline">
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
