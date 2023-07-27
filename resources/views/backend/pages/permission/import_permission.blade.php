@extends('admin.dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <a href="{{ route('export') }}" class="btn btn-inverse-success"> Download Excel File</a>
            </ol>
        </nav>

        <div class="row profile-body">

            <!-- middle wrapper start -->
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title">Import Permission</h6>

                            <form method="POST" action="{{ route('import') }}" class="forms-sample"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label for="Name" class="form-label">Xlsx File Import</label>
                                    <input type="file" name="import_file"
                                        class="form-control @error('import_file') is-invalid @enderror" id="Name">
                                    @error('import_file')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-inverse-warning">Upload</button>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
            <!-- middle wrapper end -->
            <!-- right wrapper start -->

            <!-- right wrapper end -->
        </div>

    </div>
@endsection
