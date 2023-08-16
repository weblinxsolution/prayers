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
                <form action="{{ Route('admin.add.country.data') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="formrow-email-input">Country Name</label>
                                <input type="text" class="form-control" placeholder="Enter country name" name="name"
                                    required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="formrow-email-input">Select Region</label>
                                <select name="region_id" class="form-control">
                                    <option selected disabled>Please Select Region</option>
                                    @foreach ($regions as $region)
                                        <option value="{{ $region->id }}"> {{ ucfirst($region->name) }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="formrow-email-input">Capital</label>
                                <input type="text" class="form-control" placeholder="Enter capital name" name="capital"
                                    required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="formrow-email-input">Country Code</label>
                                <input type="text" class="form-control" placeholder="Enter country code"
                                    name="country_code" required>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="formrow-email-input">Upload Flag</label>
                        <input type="file" class="form-control" name="flag" required>
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
