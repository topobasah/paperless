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

                            <h6 class="card-title">Edit Permission</h6>

                            <form method="POST" action="{{ route('update.permission') }}" class="forms-sample">
                                @csrf

                                <input type="hidden" name="id" value="{{ $permission->id }}">

                                <div class="mb-3">
                                    <label for="Name" class="form-label">Name Of Collection</label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror" id="Name"
                                        value="{{ $permission->name }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="group_name" class="form-label">Group Name</label>
                                    <select name="group_name" class="form-select" data-width="100%" id="group_name">
                                        <option value="" disabled selected>Select Group Name</option>
                                        <option value="collection"
                                            {{ $permission->group_name == 'collection' ? 'selected' : '' }}>
                                            Collection</option>
                                        <option value="catalog"
                                            {{ $permission->group_name == 'catalog' ? 'selected' : '' }}>
                                            Catalog
                                        </option>
                                    </select>
                                    @error('group_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <button type="submit" class="btn btn-primary me-2">Save Permission</button>
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
