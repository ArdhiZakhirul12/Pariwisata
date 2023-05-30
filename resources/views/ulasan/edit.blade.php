@extends('layout.main')

@section('container')
    <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Beri Ulasan</h1>
      </div>
      <div class="d-flex justify-content-center" >
      <div class="col-lg-8">
      <form method="post" action="/ulasan/{{ $ulasan->id }}">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="ulasan" class="form-label"><h5>Ulasan</h5></label>        
          <input type="text" class="form-control @error('ulasan') is-invalid @enderror" id="ulasan" name="ulasan" required autofocus value="{{ old('ulasan', $ulasan->ulasan) }}">
          <input type="text" hidden class="form-control @error('pariwisata') is-invalid @enderror" id="pariwisata" name="pariwisata" required value="{{ $ulasan->pariwisata_id }}">
          @error('ulasan')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="rating" class="form-label"><h5>Rating</h5></label>          
          <select class="form-select" name="rating">  
            <option value="{{ $ulasan->rating }}">{{ $ulasan->rating }}</option>            
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary mt-5 mb-3">Simpan</button>
        <a href="/home" class="btn btn-danger mt-5 mb-3">Kembali</a>
      </form>
    </div>
</div>
</div>


@endsection()