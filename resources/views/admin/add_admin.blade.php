@extends('Admin.layout.main')

@section('admin')
    <!-- Start app main Content -->
    <!-- Start app main Content -->
    <div class="main-content">
        <div class="row mb-3">
            <div class="col-6">
                <h2>
                    Add Admins
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
                <form action="{{ Route('add.admin.data') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="formrow-firstname-input">Name</label>
                        <input type="text" class="form-control" id="formrow-firstname-input" placeholder="Enter Name"
                            name="name" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="formrow-email-input">Email</label>
                                <input type="email" class="form-control" id="formrow-email-input"
                                    placeholder="Enter your Email" name="email" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="formrow-password-input">Password</label>
                                <input type="password" class="form-control" id="formrow-password-input"
                                    placeholder="Enter your password" name="password" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="formrow-firstname-input">Role</label>
                        <select class="form-control" name="role" id="" required>
                            <option value="" selected disabled>Please select admin's role</option>
                            <option value="admin">Admin</option>
                            <option value="super_admin">Super Admin</option>
                        </select>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary w-md">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Start app Footer part -->
@endsection
