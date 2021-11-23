@extends('main')
@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">

      @if (session('status'))
          <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
            {{ session('status') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
      @endif

        <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{-- <strong class="card-title">Arsip Surat</strong> --}}
                    <h3><a href="#">Arsip Surat</a></h3></br>
                    <h6>Berikut ini adalah surat-surat yang telah terbit dan diarsipkan.</h6>
                    <h6>Klik "Lihat" pada kolom aksi untuk menampilkan surat.</h6>
                </div></br>

                <div class="card-body">
                    <table id="tableSurat" class="table table-striped table-bordered">
                      <thead >
                        <tr>
                          <th scope="col">Nomor Surat</th>
                          <th scope="col">Kategori</th>
                          <th scope="col">Judul</th>
                          <th scope="col">Waktu Pengarsipan</th>
                          <th scope="col">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- PERULANGAN LIST DATA -->
                          @foreach ($data as $data)
                        <tr>
                          <td>{{ $data->nomor }}</td>
                          <td>{{ $data->kategori }}</td>
                          <td>{{ $data->judul }}</td>
                          <td>{{ $data->created_at }}</td>
                          <td>
                            <form action="{{ url('hapus/'.$data->id) }}" method="post" class="d-inline">
                              @method('delete')
                              @csrf
                              <button onclick="return confirm('Apakah anda yakin akan menghapus surat ini ?')" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                              <a href="{{ route('download', $data->file) }}" class="btn btn-warning btn-sm">Unduh</a>
                              <a href="{{ route('lihat', $data->id) }}" class="btn btn-primary btn-sm">Lihat >></a>
                          </td>
                        </tr>
                          @endforeach
                          <!-- END PERULANGAN -->
                      </tbody>
                    </table></br>
                    <a href="{{ route('tambah') }}" class="btn btn-success ">Arsipkan Surat</a>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $('#tableSurat').DataTable();
  } );
</script>

@endsection
