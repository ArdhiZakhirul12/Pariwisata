@extends('layout.main')

@section('container')
    

    <!-- Home Section Start -->
    <div class="home">
        <div class="content">
            <h5>Welcome to Jember</h5>
            <h1>Visit <span class="changecontent"></span></h1>
        </div>
    </div>

    <!-- Section Packages Start -->
    <section class="packages" id="packages">
        <div class="container">
          
          <div class="main-txt">
            <h1><span>P</span>ariwisata</h1>
          </div>
    
          <div class="row" style="margin-top: 30px;">
            @foreach ($pariwisatas as $pariwisata)
                
            
            <div class="col-md-4 py-3 py-md-0">
              <div class="card mt-4">
                <img src="{{ asset('storage/' . $pariwisata->image) }}" class="img-fluid" style="height: 250px" alt="">
                <div class="card-body">
                  <h3>{{ $pariwisata->nama_tempat }}</h3>
                  <p>{{ $pariwisata->deskripsi }}</p>
                  <a href="/home/{{ $pariwisata->id }}" class="mt-5">Detail</a>
                </div>
              </div>
    
            </div>
            @endforeach
          </div>
    
    
        </div>
      </section>
 
    <!-- About End -->

    @endsection