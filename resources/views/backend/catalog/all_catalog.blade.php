@extends('admin.dashboard')
@section('admin')
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <a href="{{ route('add.catalog') }}" class="btn btn-inverse-info"> Add New Catalog</a>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Books Catalog</h6>

                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Judul </th>
                                        <th>Penulis</th>
                                        <th>Kategori</th>
                                        <th>Kata Kunci</th>
                                        <th>Penerbit</th>
                                        <th>Tahun</th>
                                        <th>Bahasa</th>
                                        <th>Jenis</th>
                                        <th>Halaman</th>
                                        <th>Hak Cipta</th>
                                        <th>ISBN</th>
                                        <th>Hak Akses</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($catalog as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->judul }}</td>
                                            <td>{{ $item->penulis }}</td>
                                            <td>{{ $item->kategori }}</td>
                                            <td>{{ $item->kata_kunci }}</td>
                                            <td>{{ $item->penerbit }}</td>
                                            <td>{{ $item->tahun }}</td>
                                            <td>{{ $item->bahasa }}</td>
                                            <td>{{ $item->jenis }}</td>
                                            <td>{{ $item->halaman }}</td>
                                            <td>{{ $item->hak_cipta }}</td>
                                            <td>{{ $item->isbn }}</td>
                                            <td>{{ $item->hak_akses }}</td>
                                            <td>
                                                <a href="{{ route('edit.catalog', $item->id) }}"
                                                    class="btn btn-inverse-warning"> Edit </a>
                                                <a href="{{ route('delete.catalog', $item->id) }}"
                                                    class="btn btn-inverse-danger" id="delete"> Delete </a>
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
