@extends('layouts.backend')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Tambah Kategori
                </div>
                <div class="card-body">
                    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-2">
                            <label for="">Nama Produk</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" >
                            @error ('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        
                        <div class="mb-2">
                            <label for="">Kategori</label>
                            <select name="category_id" class="form-control @error('category') is-invalid @enderror" id="">
                            <option selected disabled>Pilih Kategori</option>   
                            @foreach($product as $data)
                                
                                <option value="{{ $data->category->id }}">{{ $data->category->name }}</option>
                                @endforeach
                            </select>
                            @error ('category')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="mb-2">
                            <label for="">Harga</label>
                            <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" >
                            @error ('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="mb-2">
                            <label for="">Stok</label>
                            <input type="number" name="stock" class="form-control @error('stock') is-invalid @enderror" >
                            @error ('stock')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                        
                        <div class="mb-2">
                            <label for="">Deskripsi</label>
                            <textarea name="description" class="form-control"  @error('description') is-invalid @enderror></textarea>
                            @error ('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="mb-2">
                            <label for="">Gambar</label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" >
                            @error ('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="mb-2">
                            <button type="submit" class="btn btn-sm btn-outline-primary">Simpan</button>
                            <button type="reset" class="btn btn-sm btn-outline-primary">Reset</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection