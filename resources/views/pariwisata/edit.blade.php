@extends('layout.main')

@section('container')
    <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit {{ $pariwisata->nama_tempat }}</h1>
      </div>
      <div class="d-flex justify-content-center" >
      <div class="col-lg-8">
      <form method="post" action="/pariwisata/{{ $pariwisata->id }}" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="nama_tempat" class="form-label"><h5>Tempat Pariwisata</h5></label>        
          <input type="text" class="form-control @error('nama_tempat') is-invalid @enderror" id="nama_tempat" name="nama_tempat" required autofocus value="{{ old('nama_tempat', $pariwisata->nama_tempat) }}">
          @error('nama_tempat')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="deskripsi" class="form-label"><h5>Deskripsi</h5></label>          
          <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" required value="{{ old('deskripsi',$pariwisata->deskripsi) }}">
          @error('deskripsi')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="alamat" class="form-label"><h5>Alamat</h5></label>          
          <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" required value="{{ old('alamat',$pariwisata->alamat) }}">
          @error('alamat')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="image" class="form-label"><h5>Upload Gambar</h5></label>
          <img class="img-preview img-fluid mb-3 col-sm-5" alt="">
          <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
          @error('image')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary mt-5 mb-3">Simpan</button>
        <a href="/pariwisata" class="btn btn-danger mt-5 mb-3">Kembali</a>
      </form>
    </div>
</div>
</div>
    <script> 
    // const judul = document.querySelector('#judul');
    // const slug = document.querySelector('#slug');
    
    // title.addEventListener('change', function(){
    //  fetch('/m/blog/checkSlug?title=' + judul.value)
    //  .then(response => response.json())
    //  .then(data => slug.value = data.slug)
    // });
    
    // document.addEventListener('trix-file-accept',function(e){
    //   e.preventDefault();
      
    // })
    
    function previewImage(){
      const image = document.querySelector('#image');
      const imgPreview = document.querySelector('.img-preview')
    
      imgPreview.style.display = 'block';
    
      const oFReader = new FileReader();
      oFReader.readAsDataURL(image.files[0]);
    
      oFReader.onload = function(oFREvent){
        imgPreview.src = oFREvent.target.result;
      }
    }
    </script>



@endsection()