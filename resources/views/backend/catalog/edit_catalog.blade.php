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

                            <h6 class="card-title">Edit Catalog</h6>

                            <form method="POST" action="{{ route('update.catalog') }}" class="forms-sample">
                                @csrf

                                <input type="hidden" name="id" value="{{ $catalog->id }}">

                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="judul" class="form-label">Judul</label>
                                        <input type="text" name="judul"
                                            class="form-control @error('judul') is-invalid @enderror" id="judul"
                                            value="{{ $catalog->judul }}">
                                        @error('judul')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="penulis" class="form-label">Penulis</label>
                                        <input type="text" name="penulis"
                                            class="form-control @error('penulis') is-invalid @enderror" id="penulis"
                                            value="{{ $catalog->penulis }}">
                                        @error('penulis')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="kategori" class="form-label">Kategori</label>
                                        <input type="text" name="kategori"
                                            class="form-control @error('kategori') is-invalid @enderror" id="kategori"
                                            value="{{ $catalog->kategori }}">
                                        @error('kategori')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="kata_kunci" class="form-label">Kata Kunci</label>
                                        <input type="text" name="kata_kunci"
                                            class="form-control @error('kata_kunci') is-invalid @enderror" id="kata_kunci"
                                            value="{{ $catalog->kata_kunci }}">
                                        @error('kata_kunci')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="penerbit" class="form-label">penerbit</label>
                                        <input type="text" name="penerbit"
                                            class="form-control @error('penerbit') is-invalid @enderror" id="penerbit"
                                            value="{{ $catalog->penerbit }}">
                                        @error('penerbit')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="tahun" class="form-label">tahun</label>
                                        <div class="input-group flatpickr" id="flatpickr-date">
                                            <input type="text" name="tahun"
                                                class="form-control @error('tahun') is-invalid @enderror"" data-input
                                                value="{{ $catalog->tahun }}">
                                            <span class="input-group-text input-group-addon" data-toggle><i
                                                    data-feather="calendar"></i></span>
                                        </div>

                                        @error('tahun')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="bahasa" class="form-label">bahasa</label>
                                        <input type="text" name="bahasa"
                                            class="form-control @error('bahasa') is-invalid @enderror" id="bahasa"
                                            value="{{ $catalog->bahasa }}">
                                        @error('bahasa')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="jenis" class="form-label">jenis</label>
                                        <select name="jenis" class="js-example-basic-single form-select" data-width="100%"
                                            id="jenis">
                                            <option value="buku" {{ $catalog->jenis == 'buku' ? 'selected' : '' }}>Buku
                                            </option>
                                            <option value="jurnal" {{ $catalog->jenis == 'jurnal' ? 'selected' : '' }}>
                                                Jurnal
                                            </option>
                                            <option value="skripsi" {{ $catalog->jenis == 'skripsi' ? 'selected' : '' }}>
                                                Skripsi
                                            </option>
                                            <option value="tesis" {{ $catalog->jenis == 'tesis' ? 'selected' : '' }}>Tesis
                                            </option>
                                        </select>

                                        @error('jenis')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="halaman" class="form-label">Halaman</label>
                                        <input type="text" name="halaman"
                                            class="form-control @error('halaman') is-invalid @enderror" id="halaman"
                                            value="{{ $catalog->halaman }}">
                                        @error('halaman')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="hak_cipta" class="form-label">Hak Cipta</label>
                                        <input type="text" name="hak_cipta"
                                            class="form-control @error('hak_cipta') is-invalid @enderror" id="hak_cipta"
                                            value="{{ $catalog->hak_cipta }}">
                                        @error('hak_cipta')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="isbn" class="form-label">isbn</label>
                                        <input type="text" name="isbn"
                                            class="form-control @error('isbn') is-invalid @enderror" id="isbn"
                                            value="{{ $catalog->isbn }}">
                                        @error('isbn')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="hak_akses" class="form-label">Hak Akses</label>
                                        <select name="hak_akses" class="js-example-basic-single form-select"
                                            data-width="100%" id="hak_akses">
                                            <option value="private-akses"
                                                {{ $catalog->hak_akses == 'private-akses' ? 'selected' : '' }}>Private
                                                Akses
                                            </option>
                                            <option value="open-akses"
                                                {{ $catalog->hak_akses == 'open-akses' ? 'selected' : '' }}>
                                                Open Akses</option>
                                        </select>
                                        @error('hak_akses')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary me-2">Save Collection</button>
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
