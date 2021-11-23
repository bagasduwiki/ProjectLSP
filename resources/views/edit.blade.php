@extends('main')
@section('content')

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
        <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    {{-- <strong class="card-title">Arsip Surat</strong> --}}
                    <h3><a href="#">Arsip Surat</a> / <a href="#">Lihat</a> / <a href="#">Edit File</a></h3></br>
                    <h6>Edit/Ganti surat yang telah terbit pada form ini untuk diarsipkan.</h4>
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
                    <!-- END ALERT -->

                    <!-- FORM UPDATE -->
                <form action="{{ '/'.$data->id }}" method="post" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                    <div class="row form-group">
                        <div class="col col-md-2"><label for="text-input" class=" form-control-label">Nomor Surat</label></div>
                        <div class="col-12 col col-md-8"><input type="text" id="text-input" name="nomor" value="{{ $data->nomor }}" placeholder="Isi Nomor Surat disini.." class="form-control" required></div>
                    </div>
                    {{-- <input type="hidden" id="text-input" name="id" value="{{ $data->id }}" class="form-control"> --}}

                    <div class="row form-group">
                        <div class="col col-md-2"><label for="select" class=" form-control-label">Kategori</label></div>
                        <div class="col-12 col col-md-2">
                          <select name="kategori" id="select" class="form-control">
                            <option value="Undangan"@if($data->kategori == 'Undangan') selected="selected" @endif>Undangan</option>
                            <option value="Pengumuman" @if($data->kategori == 'Pengumuman') selected="selected" @endif>Pengumuman</option>
                              <option value="Nota Dinas" @if($data->kategori == 'Nota Dinas') selected="selected" @endif>Nota Dinas</option>
                              <option value="Pemberitahuan" @if($data->kategori == 'Pemberitahuan') selected="selected" @endif>Pemberitahuan</option>
                          </select>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-2"><label for="text-input" class=" form-control-label">Judul</label></div>
                        <div class="col-12 col col-md-8"><input type="text" id="text-input" name="judul" value="{{ $data->judul }}" placeholder="Isi Judul Surat disini..." class="form-control" required></div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-2"><label for="file-input" class=" form-control-label">File input</label></div>
                        <div class="col-12 col-md-4"><input type="file" id="file-input" accept="application/pdf" name="file" value="{{ $data->file }}" class="form-control-file" required></div>
                    </div>

                    <div class="card-footer col-12">
                        <a href="{{ route('home') }}" class="btn btn-danger">Batal</a>
                        <button type="submit" onclick="return confirm('Update data arsip ?')" class="btn btn-success">
                          Update
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
