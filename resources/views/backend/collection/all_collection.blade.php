@extends('admin.dashboard')
@section('admin')
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <a href="{{ route('add.collection') }}" class="btn btn-inverse-info"> Add Collection Data</a>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Collections Library</h6>

                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>S1</th>
                                        <th>Name</th>
                                        <th>Icon</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($collections as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->icon }}</td>
                                            <td>
                                                <a href="{{ route('edit.collection', $item->id) }}"
                                                    class="btn btn-inverse-warning"> Edit </a>
                                                <a href="{{ route('delete.collection', $item->id) }}"
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
