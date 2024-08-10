@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center mt-5">
        @foreach ($posts as $post)
            <div class="col-md-4 p-1">
                <div class="card" style="width: 100%; padding-bottom: 100%; position: relative;">
                    <img src="{{ asset($post->image) }}" data-bs-toggle="modal" data-bs-target="#postinganModal" class="card-img-top" style="cursor: pointer; position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover;" alt="">
                <!-- Modal -->
                <div class="modal fade" id="postinganModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        ...
                        </div>
                    </div>
                    </div>
                </div>
                {{--  --}}
                </div>
            </div>
        @endforeach
    </div>   
</div>

@endsection
