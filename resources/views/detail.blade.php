@extends('layouts.main')

@section('container')
<div class="container">
    <div class="row">
        <div class="col-md-4 mt-3 mb-3">
            <img src="{{ asset('uploads/' . $books->gambar) }}" width="400" class="card-img-top" alt="...">
        </div>
        <div class="col-md-8 mt-3 mb-3">
            <h5 class="card-title">{{ $books->judul}}</h5>
            <h5 class="card-title">{{ $books->pengarang}}</h5>
            <h5 class="card-title">{{ $books->penerbit}}</h5>
            <h5 class="card-title">{{ $books->thn_terbit}}</h5>
            <h5 class="card-title">{{ $books->jml_halaman}}</h5>
        </div>
    </div>
</div>
@endsection