@extends('layouts.app')
@section('title', 'Rifqi | Books Data')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Form Edit</strong> Book
                        </div>
                        <div class="card-body card-block">
                            {{-- <form action="{{ route('books.update', $book->id)}}" enctype="multipart/form-data" method="post" class="">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="judul" class=" form-control-label">Judul</label>
                                    <input type="text" name="judul" class="form-control" value="{{ $book->judul}}">
                                </div>
                                <div class="form-group">
                                    <label for="pengarang" class=" form-control-label">Pengarang</label>
                                    <input type="text" name="pengarang" class="form-control" value="{{ $book->pengarang}}">
                                </div>
                                <div class="form-group">
                                    <label for="penerbit" class=" form-control-label">Penerbit</label>
                                    <input type="penerbit" name="penerbit" class="form-control" value="{{ $book->penerbit}}">
                                </div>
                                <div class="form-group">
                                    <label for="waktu">Tahun Terbit</label>
                                    <input type="date" class="form-control" id="time" name="time" value="{{ $book->thn_terbit}}">
                                </div>
                                <div class="form-group">
                                    <label for="inputjmlhalaman" class=" form-control-label">Jumlah Halaman</label>
                                    <input name="jml_halaman" class="form-control" value="{{ $book->jml_halaman}}">
                                </div>
                                <div class="form-group">
                                    <label for="inputgambar" class=" form-control-label">Gambar</label><br>
                                    <input type="file" name="gambar" value="{{ $book->gambar}}">
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fa fa-dot-circle-o"></i> Ubah
                                    </button>
                                </div>
                            </form> --}}
                            <form action="{{ route('books.update', $book->id)}}" method="post" class="" enctype='multipart/form-data'>
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label class=" form-control-label">Judul</label>
                                    <input type="text" name="judul" class="form-control" value="{{$book->judul}}">
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Pengarang</label>
                                    <input type="text" name="pengarang" class="form-control" value="{{$book->pengarang}}">
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Penerbit</label>
                                    <input type="text" name="penerbit" class="form-control" value="{{$book->penerbit}}">
                                </div><div class="form-group">
                                    <label class=" form-control-label">Tahun terbit</label>
                                    <input type="date" name="thn_terbit" class="form-control" value="{{$book->thn_terbit}}">
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Pilih Gambar</label>
                                    <input type="file" name="gambar" class="form-control" value="{{$book->gambar}}">
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Jumlah Halaman</label>
                                    <input type="text" name="jml_halaman" class="form-control" value="{{$book->jml_halaman}}">
                                </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fa fa-dot-circle-o"></i> Ubah
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection