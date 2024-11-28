<div class="modal fade" id="tambahReservasiModal" tabindex="-1" aria-labelledby="ttambahReservasiModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahReservasiModalLabel">Tambah Reservasi Kamar</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('save-reservasi') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <!-- tamu -->
          <div class="mb-3">
            <label for="tamu_id" class="form-label">Nama Tamu</label>
            <select class="form-control" id="tamu_id" name="tamu_id" required>
              <option value="" disabled selected>Pilih Tamu Hotel</option>
              @foreach($tamu as $tamus)
                <option value="{{ $tamus->id }}">{{ $tamus->nama_panjang }}</option>
              @endforeach
            </select>
          </div>
          <!-- kamar -->
          <div class="mb-3">
            <label for="kamar_id" class="form-label">Kamar</label>
            <select class="form-control" id="kamar_id" name="kamar_id" required>
              <option value="" disabled selected>Pilih Kamar Hotel</option>
              @foreach($kamar as $kamars)
                <option value="{{ $kamars->id }}" data-harga="{{ $kamars->tipeKamar->harga_kamar }}">
                  {{ $kamars->nomor_kamar }}
                </option>
              @endforeach
            </select>
          </div>
          <!-- kota -->
          <div class="mb-3">
            <label for="kota" class="form-label">Kota</label>
            <select class="form-control" id="kota" name="kota" required>
              <option value="Jakarta">Jakarta</option>
              <option value="Surabaya">Surabaya</option>
              <option value="Solo">Solo</option>
              <option value="Bandung">Bandung</option>
            </select>
          </div>
          <!-- tanggal check in -->
          <div class="mb-3">
            <label for="tanggal_check_in" class="form-label">Tanggal Check-In</label>
            <input type="date" class="form-control" id="tanggal_check_in" name="tanggal_check_in" required>
          </div>
          <!-- tanggal check out -->
          <div class="mb-3">
            <label for="tanggal_check_out" class="form-label">Tanggal Check-Out</label>
            <input type="date" class="form-control" id="tanggal_check_out" name="tanggal_check_out" required>
          </div>
          <!-- jumlah orang -->
          <div class="mb-3">
            <label for="jumlah_orang" class="form-label">Jumlah Orang</label>
            <select class="form-control" id="jumlah_orang" name="jumlah_orang" required>
              <option value="1">1 Orang</option>
              <option value="2">2 Orang</option>
              <option value="4">4 Orang</option>
              <option value="6">6 Orang</option>
            </select>
          </div>
          <!-- total harga -->
          <div class="mb-3">
            <label for="total_harga" class="form-label">Total Harga</label>
            <input type="text" class="form-control" id="total_harga" name="total_harga" readonly>
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


@extends('components-admin.app')
@section('title','Reservasi')
@section('main')
<div class="col-12 col-md-6 col-lg-12">
  <div class="card">
  <div class="card-header justify-content-end">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahReservasiModal">
        Tambah Reservasi Kamar
      </button>
    </div>
    <div class="card-body p-0">
      <div class="table-responsive">
      <table class="table table-striped table-md">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Tamu</th>
                    <th>Nomor Kamar</th>
                    <th>Kota</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                    <th>Jumlah Orang</th>
                    <th>Total Harga</th>
                    <th style="text-align:center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($reservasi as $index => $reservasis)
                <tr class="text-center">
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $reservasis->tamu->nama_panjang}}</td>
                    <td>{{ $reservasis->kamar->nomor_kamar}}</td>
                    <td>{{ $reservasis->kota}}</td>
                    <td>{{ $reservasis->tanggal_check_in}}</td>
                    <td>{{ $reservasis->tanggal_check_out}}</td>
                    <td>{{ $reservasis->jumlah_orang }}</td>
                    <td>Rp. {{ number_format($reservasis->kamar->tipekamar->harga_kamar, 0, ',', '.') }}</td>
                    <td style="text-align:center">
                        <button class="btn btn-warning" style="width:100px" data-toggle="modal" data-target="#editTamuModal">
                            <i class="far fa-edit mr-3"></i>Edit
                        </button>
                        <form action="" method="POST" class="d-inline">
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
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const tanggalCheckIn = document.getElementById('tanggal_check_in');
    const tanggalCheckOut = document.getElementById('tanggal_check_out');
    const kamarSelect = document.getElementById('kamar_id');
    const totalHarga = document.getElementById('total_harga');

    function calculateTotal() {
      const checkInDate = new Date(tanggalCheckIn.value);
      const checkOutDate = new Date(tanggalCheckOut.value);

      // Pastikan tanggal valid
      if (!isNaN(checkInDate) && !isNaN(checkOutDate) && checkOutDate > checkInDate) {
        const diffTime = Math.abs(checkOutDate - checkInDate);
        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); // Konversi ke hari

        // Ambil harga kamar dari opsi yang dipilih
        const selectedOption = kamarSelect.options[kamarSelect.selectedIndex];
        const hargaKamar = parseFloat(selectedOption.getAttribute('data-harga'));

        // Hitung total harga
        if (!isNaN(hargaKamar)) {
          totalHarga.value = diffDays * hargaKamar;
        }
      } else {
        totalHarga.value = ''; // Kosongkan jika tanggal tidak valid
      }
    }

    // Tambahkan event listener
    tanggalCheckIn.addEventListener('change', calculateTotal);
    tanggalCheckOut.addEventListener('change', calculateTotal);
    kamarSelect.addEventListener('change', calculateTotal);
  });
</script>