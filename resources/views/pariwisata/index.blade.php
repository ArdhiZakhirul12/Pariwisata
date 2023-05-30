@extends('layout.main')

@section('container')

<!-- Section Packages Start -->
<section class="packages" id="packages">
    <div class="container">
        @if(session()->has('success'))
        <div class="alert alert-success col-lg-9 mt-5" role="alert">
            {{ session('success') }}
        </div>
        @endif
      <div class="main-txt">
        <h1><span>P</span>ariwisata</h1>
      </div>
      <a class="btn btn-primary btn-lg w-40 mt-3 mb-3" type="button" href="pariwisata/create">Tambah Pariwisata</a>
      
      <div class="row" style="margin-top: 30px;">
        @foreach ($pariwisatas as $pariwisata)
            
        
        <div class="col-md-4 py-3 py-md-0">
          <div class="card mt-4">
            <img src="{{ asset('storage/' . $pariwisata->image) }}" class="img-fluid" style="height: 250px" alt="">
            <div class="card-body">
              <h3>{{ $pariwisata->nama_tempat }}</h3>
              <p>{{ $pariwisata->deskripsi }}</p>
              <a href="pariwisata/{{ $pariwisata->id }}/edit" class="mt-5">Edit</a>
              <form action="/pariwisata/{{ $pariwisata->id }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger pt-2 border-0" onclick="return confirm('anda yakin ingin menghapus?')"><span data-feather="trash"></span> Hapus</button>
              </form>  

            </div>
          </div>

        </div>
        @endforeach
      </div>


    </div>
  </section>

@endsection()