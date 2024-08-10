@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-success" style="color: white">Selamat Datang, <strong>{{ Auth::user()->name }}</strong></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Kamu sudah login!') }}
                    <br>                    
                        <a href="/create" type="button" class="btn btn-success mt-2">+ Buat Postingan Baru</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-success" style="color: white">Jumlah Postingan</div>
                <div class="card-body">
                    <p>{{ $posts }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-success" style="color: white">Menu Postingan</div>
                <div class="card-body">
                    <a href="/lihatpostingan" type="button" class="btn btn-success mt-2">Beranda Postingan</a>
                    <a href="/explore" type="button" class="btn btn-success mt-2">Explore Postingan</a>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection
