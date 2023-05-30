@extends('layout.main')

@section('container')

   <!-- About Start -->
   <section class="about" id="about">
    <div class="container">
      <div class="main-txt">
        <h1>About <span>Us</span></h1>
      </div>

      <div class="row" style="margin-top: 50px;">

        <div class="col-md-6 py-3 py-md-0">
          <div class="card">
            <img src="{{ asset('storage/' . $pariwisata->image) }}" alt="">
          </div>
        </div>

        <div class="col-md-6 py-3 py-md-0">
          <h2>{{ $pariwisata->nama_tempat }}</h2>
          <p>{{ $pariwisata->deskripsi }}</p>
          {{-- <button id="about-btn">Read More...</button> --}}
        </div>

      </div>

    </div>
  </section>

@endsection()