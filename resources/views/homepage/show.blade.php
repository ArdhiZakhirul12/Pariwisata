@extends('layout.main')

@section('container')

   <!-- About Start -->
   <section class="about" id="about">
    <div class="container">
      @if(session()->has('success'))
        <div class="alert alert-success col-lg-9" role="alert">
            {{ session('success') }}
        </div>
        @endif
      <div class="main-txt">
        <h1>About <span>Us</span></h1>
      </div>
      <a href="/home" class="btn btn-danger mt-5 mb-3">Kembali</a>
      <div class="row" style="margin-top: 50px;">

        <div class="col-md-6 py-3 py-md-0">
          <div class="card">
            <img src="{{ asset('storage/' . $pariwisata->image) }}" alt="">
          </div>
        </div>

        <div class="col-md-6 py-3 py-md-0">
          <h2>{{ $pariwisata->nama_tempat }}</h2>
          <p>{{ $pariwisata->deskripsi }}</p>
        </div>
        <a href="/ulasan/create/{{ $pariwisata->id }}"><button class="ms-3 mt-5 mb-5" id="about-btn">Ulasan</button></a>      
      </div>
      @foreach ($ulasans as $ulasan)
      <div class="d-flex">
        <div class="col-lg-8">
      <h5>{{ $ulasan->ulasan }}</h5>
      <p>rating {{ $ulasan->rating }}/5</p>
    </div>
    <div class="col-lg-4">
    <a type="button" href="/ulasan/{{ $ulasan->id }}/edit" class="btn btn-outline-warning btn-sm mt-2 ">Edit</a>
              <form action="/ulasan/{{ $ulasan->id }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-outline-danger btn-sm mt-2 " onclick="return confirm('anda yakin ingin menghapus?')"><span data-feather="trash"></span> Hapus</button>
              </form>  
</div>
      </div>
      <hr>
      @endforeach
    </div>
  </section>

@endsection()