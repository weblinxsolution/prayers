@extends('Admin.layout.main')

@section('admin')
    <!-- Start app main Content -->
    <!-- Start app main Content -->
    <div class="main-content">
        <div class="row mb-3">
            <div class="col-6">
                <h2>
                    Add Feature
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
                <form action="{{ Route('admin.add.feature.data') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="formrow-email-input">Title</label>
                        <input type="text" class="form-control" placeholder="Enter title" name="title" required>
                    </div>

                    <div class="form-group">
                        <label for="my-input">Description</label>
                        <textarea name="desc" class="form-control" cols="30" rows="10"
                            placeholder="Here goes article's description"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label class="form-label" for="formrow-email-input">Android Button link</label>
                            <input type="text" class="form-control" placeholder="Enter Android Button link"
                                name="androaidLink" required>
                        </div>
                        <div class="col-6">
                            <label class="form-label" for="formrow-email-input">IOS Button link</label>
                            <input type="text" class="form-control" placeholder="Enter IOS Button link" name="iosLink"
                                required>
                        </div>
                    </div>

                    <div class="form-group mt-4">
                        <label class="form-label" for="formrow-email-input">Upload Images</label>
                        <input name="images[]" type="file" multiple class="form-control" />
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
