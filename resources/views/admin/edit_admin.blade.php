@extends('Admin.layout.main')
@section('admin')
    <!-- Start app main Content -->
    <!-- Start app main Content -->
    <div class="main-content">
        <div class="row mb-3">
            <div class="col-6">
                <h2>
                    Edit Admins
                </h2>
            </div>
        </div>
        <div class="container">
            @if (session('errors'))
                <div class="alert alert-danger alert-dismissable">
                    <ul style="list-style-type: none;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissable">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success alert-dismissable">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card p-5">
                <form action="{{ Route('edit.admin.data', ['id' => $admins->id]) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="formrow-firstname-input">Name</label>
                        <input type="text" class="form-control" id="formrow-firstname-input" placeholder="Enter Name"
                            name="name" required value="{{ $admins->name }}">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="formrow-email-input">Email</label>
                                <input type="email" class="form-control" id="formrow-email-input"
                                    placeholder="Enter your Email" name="email" required value="{{ $admins->email }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="formrow-password-input">Password</label>
                                <input type="password" class="form-control" id="formrow-password-input"
                                    placeholder="Enter your password" name="password"  value="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="formrow-firstname-input">Role</label>
                                <select class="form-control" name="role" id="" required>
                                    <option value="" selected disabled>Please select admin's role</option>
                                    <option value="admin" {{ $admins->role == 'admin' ? 'selected' : '' }}>
                                        Admin</option>
                                    <option value="super_admin" {{ $admins->role == 'super_admin' ? 'selected' : '' }}>Super
                                        Admin
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mt-4">
                            <div class="form-group">
                                <div class="control-label">Status</div>
                                <label class="custom-switch mt-2">
                                    <input type="checkbox" name="status" class="custom-switch-input" {{ $admins->status == '1' ? 'checked' : '' }}>
                                    <span class="custom-switch-indicator"></span>
                                    <span class="custom-switch-description">on</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 mb-5">
                        <button type="submit" class="btn btn-primary w-md">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Start app Footer part -->
@endsection
