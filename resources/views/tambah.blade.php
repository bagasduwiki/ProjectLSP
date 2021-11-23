@extends('main')
@section('content')

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
        <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    {{-- <strong class="card-title">Arsip Surat</strong> --}}
                    <h3><a href="#">Arsip Surat</a> / <a href="#">Unggah</a></h3></br>
                    <h6>Unggah surat yang telah terbit pada form ini untuk diarsipkan.</h4>
                    <h6>Catatan :</h6>
                    <h6><li>Gunakan file berformat PDF</li></h6>
                </div></br>


                <div class="card-body">
                  <!-- FUNGSI ALERT -->
                    @if (session('status'))
                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                      {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    @endif

                    @if ($errors->any())
                    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                      </button>
                    @foreach ($errors->all() as $error)
                      {{ $error }}
                    @endforeach
                    </div>
                    @endif
                    <!-- END ALERT -->

                    <!-- FORM TAMBAH DATA SURAT -->
                <form action="{{ 'storeSurat' }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row form-group">
                        <div class="col col-md-2"><label for="text-input" class=" form-control-label">Nomor Surat</label></div>
                        <div class="col-12 col col-md-8"><input type="text" id="text-input" name="nomor" placeholder="Isi Nomor Surat disini.." class="form-control" required></div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-2"><label for="select" class=" form-control-label">Kategori</label></div>
                        <div class="col-12 col col-md-2">
                          <select name="kategori" id="select" class="form-control">
                            <option value="Undangan">Undangan</option>
                            <option value="Pengumuman">Pengumuman</option>
                              <option value="Nota Dinas">Nota Dinas</option>
                              <option value="Pemberitahuan">Pemberitahuan</option>
                          </select>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-2"><label for="text-input" class=" form-control-label">Judul</label></div>
                        <div class="col-12 col col-md-8"><input type="text" id="text-input" name="judul" placeholder="Isi Judul Surat disini..." class="form-control" required></div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-2"><label for="file-input" class=" form-control-label">File input</label></div>
                        <div class="col-12 col-md-4"><input type="file" accept="application/pdf" id="file-input" name="file" class="form-control-file" required></div>
                    </div>

                    <div class="card-footer col-12">

                            <a href="{{ route('home') }}" class="btn btn-primary"><< Kembali</a>

                        <button type="submit" onclick="return confirm('Simpan data arsip ?')" class="btn btn-success">
                          Simpan
                        </button>
                    </div>
                </form>
                <!-- END FORM -->
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

@endsection
