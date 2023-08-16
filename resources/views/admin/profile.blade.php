@extends('Admin.layout.main')
@section('admin')
    <div class="main-content">
        <div class="row mb-5">
            <div class="col-6">
                <h2>
                    Profile Setings
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
            <div class="row">
                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card">
                        <form method="post" class="needs-validation" action="{{ Route('admin.editProfile' ,['id' => $admin->id ]) }}">
                           @csrf
                            <div class="card-header">
                                <h4>Edit Profile</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-12 col-12">
                                        <label>Name</label>
                                        <input disabled name="name" value="{{ $admin->name }}" type="text" class="form-control" >
                                        <span class="text-danger">* Name is not edit able</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-7 col-12">
                                        <label>Email</label>
                                        <input type="email" disabled class="form-control" value="{{ $admin->email }}"
                                            name="email" >
                                            <span class="text-danger">* E-mail is not edit able</span>
                                    </div>
                                    <div class="form-group col-md-5 col-12">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control" value="">
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
