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
                <form action="{{ Route('add.citiesData') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="formrow-email-input">Name</label>
                                <input type="text" class="form-control" placeholder="Enter city name" name="name"
                                    required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="formrow-email-input">Select Country</label>
                                <select name="country_id" class="form-control">
                                    <option selected disabled>Please Select Country</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}"> {{ ucfirst($country->name) }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="formrow-email-input">Country Code</label>
                                <input type="text" class="form-control" placeholder="Enter country code"
                                    name="country_code" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mt-3">
                                <div class="control-label">Capital </div>
                                <label class="custom-switch mt-2">
                                    <input type="checkbox" name="capital" class="custom-switch-input" >
                                    <span class="custom-switch-indicator"></span>
                                    <span class="custom-switch-description">Yes</span>
                                </label>
                            </div>
                        </div>
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
