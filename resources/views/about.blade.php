@extends('main')
@section('content')


<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
        <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    {{-- <strong class="card-title">Arsip Surat</strong> --}}
                    <h3><a href="#">About</a></h3></br>
                </div>
                <div class="card-body">
                   <div class="row form-group">
                        <img class="align-self-center mr-3" style="width:170px; height:215px;" alt="" src="{{asset ('assets/images/admin.jpg')}}">

                    <div class="col-12 col col-md-8">
                       <b> Aplikasi ini dibuat oleh : </b></br>
                        Nama : Bagas Dwiki Purbo Kusumo </br>
                        NIM : 1931713032 </br>
                        Tanggal : 23 November 2021 </br>
                    </div>
                   </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
