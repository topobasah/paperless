@extends('admin.dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="page-content">

        <div class="row profile-body">

            <!-- middle wrapper start -->
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title">Edit Hak Akses</h6>

                            <form method="POST" action="{{ route('update.hakakses') }}" class="forms-sample">
                                @csrf

                                <input type="hidden" name="id" value="{{ $hakakses->id }}">

                                <div class="mb-3">
                                    <label for="hakAkses" class="form-label">Hak Akses Type</label>
                                    <input type="text" name="hak_akses"
                                        class="form-control @error('hak_akses') is-invalid @enderror" id="hakAkses"
                                        value="{{ $hakakses->hak_akses }}">
                                    @error('hak_akses')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="keterangan" class="form-label">Keterangan</label>
                                    <input type="text" name="keterangan"
                                        class="form-control @error('keterangan') is-invalid @enderror" id="keterangan"
                                        value="{{ $hakakses->keterangan }}">
                                    @error('keterangan')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary me-2">Save Hak Akses</button>
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
