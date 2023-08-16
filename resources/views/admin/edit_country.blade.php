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
                <form action="{{ Route('admin.edit.countryData', ['id' => $country->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="formrow-email-input">Country Name</label>
                                <input type="text" class="form-control" placeholder="Enter country name" name="name"
                                    required value="{{ $country->name }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="formrow-email-input">Select Region</label>
                                <select name="region_id" class="form-control">
                                    @foreach ($regions as $region)
                                        <option selected value="{{ $region->id }}"> {{ ucfirst($region->name) }}
                                        </option>
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
                                    required value="{{ $country->capital }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="formrow-email-input">Country Code</label>
                                <input type="text" class="form-control" placeholder="Enter country code"
                                    name="country_code" required value="{{ $country->country_code }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="formrow-email-input">Upload Flag</label>
                                <input type="file" class="form-control" name="flag" >
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mt-2">
                                <div class="control-label">Status</div>
                                <label class="custom-switch mt-2">
                                    <input type="checkbox" name="status" class="custom-switch-input"
                                        {{ $country->status == '1' ? 'checked' : '' }}>
                                    <span class="custom-switch-indicator"></span>
                                    <span class="custom-switch-description">on</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    {{-- preview --}}
                    <div>
                        <img src="{{ asset('countryFlags/'. $country->flag_image) }}" alt="" width="200px">
                    </div>
                    {{-- end preview --}}
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary w-md">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Start app Footer part -->
@endsection
