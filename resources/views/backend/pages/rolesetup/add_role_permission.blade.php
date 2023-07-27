@extends('admin.dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <style type="text/css">
        .form-check-label {
            text-transform: capitalize;
        }
    </style>

    <div class="page-content">

        <div class="row profile-body">

            <!-- middle wrapper start -->
            <div class="col-md-12 col-xl-12 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title">Add New Roles in Permission</h6>

                            <form method="POST" action="{{ route('role.permission.store') }}" class="forms-sample">
                                @csrf

                                <div class="mb-3">
                                    <label for="roleId" class="form-label">Role Name</label>
                                    {{-- <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror" id="Name"> --}}

                                    <select name="role_id" id="roleId" class="form-select">
                                        <option value="" disabled selected>Select Role</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('role_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-check mb-2">
                                    <input type="checkbox" name="permission_id" id="permissionId" class="form-check-input">
                                    <label for="permissionId" class="form-check-label">
                                        Permission All
                                    </label>
                                </div>

                                <hr />

                                @foreach ($permission_groups as $group)
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-check mb-2">
                                                <input type="checkbox" name="group_name" id="groupName"
                                                    class="form-check-input">
                                                <label for="groupName" class="form-check-label">
                                                    {{ $group->group_name }}
                                                </label>
                                            </div>
                                        </div>


                                        <div class="col-9">
                                            @php
                                                $permissions = App\Models\User::getpermissionByGroupName($group->group_name);
                                            @endphp
                                            @foreach ($permissions as $permission)
                                                <div class="form-check mb-2">
                                                    <input type="checkbox" name="permission[]"
                                                        id="permission{{ $permission->id }}" class="form-check-input"
                                                        value="{{ $permission->id }}">
                                                    <label for="permission{{ $permission->id }}" class="form-check-label">
                                                        {{ $permission->name }}
                                                    </label>
                                                </div>
                                            @endforeach
                                            <br />
                                        </div>
                                    </div>
                                @endforeach

                                <button type="submit" class="btn btn-primary me-2">Save Role</button>
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

    <script type="text/javascript">
        $('#permissionId').click(function() {
            if ($(this).is(':checked')) {
                $('input[type=checkbox]').prop('checked', true);
            } else {
                $('input[type=checkbox]').prop('checked', false);
            }
        })
    </script>
@endsection
