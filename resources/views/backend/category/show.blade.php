@extends('layouts.backend')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Detail Kategori
                </div>
                <div class="card-body">
                    <form action="{{ route('backend.category.show', $category->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-2">
                            <label for="">Nama Kategori</label>
                            <input type="text" name="name" disabled value="{{ $category->name }}" class="form-control @error('name') is-invalid @enderror" >
                            @error ('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="mb-2">
                            <a href="{{ route('backend.category.index') }}" class="btn btn-primary btn-sm">Kembali</a>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection