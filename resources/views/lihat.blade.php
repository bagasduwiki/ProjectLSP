@extends('main')
@section('content')

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
        <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Arsip Surat</strong>
                    <h3><a href="#">Arsip Surat</a> / <a href="#">Lihat</a></h3></br>

                    {{-- @foreach($data as $data) --}}
                    <h6>Nomor : {{$data->nomor}}</h6>
                    <h6>Kategori : {{$data->kategori}}</h6>
                    <h6>Judul : {{$data->judul}}</h6>
                    <h6>Waktu Unggah : {{$data->created_at}}</h6>
                </div>
                </br>
                <div class="card-body">
                    <iframe style="overflow:hidden;height:600;width:100%" height="500" width="100%" src="/assets/{{ $data->file }}"></iframe>
                </div>
                     {{-- @endforeach --}}
                <div class="card-footer col-12">
                    <a href="{{ route('home') }}" class="btn btn-primary"><< Kembali</a>
                    <a href="{{ route('download', $data->file) }}" class="btn btn-warning">Unduh</a>
                    <a href="{{ route('edit', $data->id) }}" class="btn btn-success"> Edit/Ganti File</a>
            </div>
          </div>
        </div>
        </div>
    </div>
</div>

@endsection
