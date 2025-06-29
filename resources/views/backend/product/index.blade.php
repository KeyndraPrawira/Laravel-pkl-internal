@extends('layouts.backend');
@section('styles');
<link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.bootstrap5.css">
@endsection


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header bg-secondary">
                        Data Category
                        <a href="{{ route('backend.product.create') }}" class="btn btn-info btn-sm" style="color:white; float: right;">
                            Tambah
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table table-responsive">
                            <table id="dataProduct" class="table">
                                <thead>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Kategori</th>
                                    <th>Slug</th>
                                    <th>Deskripsi</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>gambar</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    @foreach($product as $data)
                                    <tr>
                                        
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->name }}</td>
                                       
                                        <td>{{ $data->category->name }}</td>
                                         <td>{{ $data->slug }}</td>
                                        <td>{{ Str::limit($data->description, 3, '...') }}</td>
                                        <td>{{$data->price}}</td>
                                        <td>{{ $data->stock }}</td>
                                        <td>
                                            @if($data->image)
                                                <img src="{{asset('storage/'.$data->image)  }}" width="100px" height="50px" alt="">
                                            @else
                                                <p>Tidak Ada</p>
                                            @endelse
                                            @endif
                                        
                                        </td>
                                        
                                        <td>
                                            <a href="{{ route('backend.product.edit', $data->id) }}" class="btn btn-warning btn-sm">Edit</a> | 
                                            <a href="{{ route('backend.product.show', $data->id) }}" class="btn btn-success btn-sm" >Show</a> | 
                                            <a href="{{ route('backend.product.destroy', $data->id) }}" class="btn btn-danger btn-sm" data-confirm-delete="true">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
@endsection


@push('scripts')
<script src="https://cdn.datatables.net/2.3.2/js/dataTables.js" ></script>
<script src="https://cdn.datatables.net/2.3.2/js/dataTables.bootstrap5.js"></script>
<script>
    new DataTable('#dataProduct');
</script>
@endpush