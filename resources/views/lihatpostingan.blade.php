@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            @foreach ($posts as $post)
            <div class="col-md-4">
                <div class="mt-4">
                    <div class="card" >
                        <div class="card-header fw-bold d-flex justify-content-between align-items-center">{{ Auth::user()->name }} <i class="bi bi-three-dots-vertical" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#opsi"></i></div>
                        <!-- Modal -->
                        <div class="modal fade" id="opsi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body d-flex flex-column align-items-center">
                                    <a href="delete/{{ $post->id }}" style="text-decoration: none;" class="font-medium text-danger hover:underline ">Delete</a>
                                    <a href="/edit"  style="text-decoration: none;" class="font-medium text-black hover:underline" >Sunting</a>
                                </div>
                            </div>
                            </div>
                        </div>
  
                        <img src="{{ asset($post->image) }}" alt="" style="object-fit: cover; width: 100%; height: 300px;">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div style="cursor: pointer;">
                                     {{-- like --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-heart me-2" viewBox="0 0 16 16">
                                        <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                                      </svg>
            
                                              {{-- comment --}}
                                                <svg xmlns="http://www.w3.org/2000/svg" data-bs-toggle="modal" data-bs-target="#modalComment{{ $post->id }}" width="24" height="24" fill="currentColor" class="bi bi-chat me-2" viewBox="0 0 16 16">
                                                    <path d="M2.678 11.894a1 1 0 0 1 .287.801 11 11 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8 8 0 0 0 8 14c3.996 0 7-2.807 7-6s-3.004-6-7-6-7 2.808-7 6c0 1.468.617 2.83 1.678 3.894m-.493 3.905a22 22 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a10 10 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9 9 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105"/>
                                                  </svg>

            
                                      {{-- share --}}
                                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                                        <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576zm6.787-8.201L1.591 6.602l4.339 2.76z"/>
                                      </svg>
                                </div>
                                <div style="cursor: pointer;">
                                        {{-- save --}}
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-bookmark justify-content-between" viewBox="0 0 16 16">
                                            <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1z"/>
                                        </svg>
                                </div>
                            </div>
    
                            <p class="mt-3"><strong class="fs-6">{{ Auth::user()->name }}</strong> <span class="ms-2">{{ $post->deskripsi }}</span></p>
                            <p class="fs-6 text-secondary">Diposting {{ \Carbon\Carbon::parse($post->created_at)->locale('id')->diffForHumans() }} Oleh {{ Auth::user()->name }} </p> 

                            
                        </div>
                    </div>
                </div>
            </div>
                @endforeach
            </div>
        </div>
    </div>

                   <!-- Modal -->
                   @foreach ($posts as $post)
                   <div class="modal fade" id="modalComment{{ $post->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Apa Kata Dunia</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        
                        <div class="modal-body">
                        @foreach ($post->comments as $item)
                        <div class="border-bottom">
                            
                            <span class="fw-bold">{{ $item->nama }}</span>
                            <br>
                            <span class="">{{ $item->comment }}</span>
                            
                        </div>
                        @endforeach
                        {{-- input comment --}}
                        <form action="/addcomment" method="POST">
                            @csrf
                            <input type="text" style="visibility: hidden" name="post_id" value="{{ $post->id }}">
                            <div class="mb-3 pt-5">
                                <label for="exampleFormControlInput1" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="tulis nama kamu" name="nama">
                              </div>
                            <div class="mb-3 ">
                                <label for="exampleFormControlInput1" class="form-label">Komentar</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="tulis komentar kamu" name="comment">
                              </div>
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </form>
                        {{-- end input comment --}}
                        </div>
                    </div>
                    </div>
                </div>
                @endforeach
                {{-- end modal comment --}}
@endsection
