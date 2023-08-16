@extends('Admin.layout.main')

@section('admin')
    <!-- Start app main Content -->
    <!-- Start app main Content -->
    <div class="main-content">
        <div class="row mb-3">
            <div class="col-6">
                <h2>
                    {{ $title }}
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
                <form action="{{ Route('admin.edit.regionData', ['id' => $region->id] ) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="formrow-email-input">Name</label>
                        <input type="text" class="form-control" placeholder="Enter region name" name="name"
                            value="{{ $region->name }}" required>
                    </div>

                    <div class="form-group">
                        <div class="control-label">Status</div>
                        <label class="custom-switch mt-2">
                            <input type="checkbox" name="status" class="custom-switch-input"
                                {{ $region->status == '1' ? 'checked' : '' }}>
                            <span class="custom-switch-indicator"></span>
                            <span class="custom-switch-description">on</span>
                        </label>
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
