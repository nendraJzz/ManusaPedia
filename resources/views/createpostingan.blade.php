@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-center mt-5">
            <div class="col-md-3">
                <form method="POST" action="/addpost" enctype="multipart/form-data">
                @csrf
                <h1>Buat Postingan</h1>
                  <div class="mb-3">
                    <label for="formFile" class="form-label">Pilih Gambar</label>
                    <input class="form-control" type="file" id="formFile" accept="jpg.jpeg.image/png.image/jpeg" name="gambar">
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Masukan Deskripsi" name="deskripsi"></textarea>
                  </div>
                  <button type="submit" class="btn btn-success">Buat Postingan</button>
                </form>
            </div>

        </div>
    </div>
@endsection