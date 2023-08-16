@extends('Admin.layout.main')

@section('admin')
    <!-- Start app main Content -->
    <!-- Start app main Content -->
    <div class="main-content">
        <div class="row mb-3">
            <div class="col-6">
                <h2>
                    Add Articles
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
                <form action="{{ Route('admin.add.article.data') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="formrow-email-input">Title</label>
                                <input type="text" class="form-control" placeholder="Enter title" name="title"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Upload Image</label>
                                <input type="file" class="form-control" name="image" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                            <label for="my-input">Description <span class="text-danger">(Optional)</span></label>
                            <textarea name="desc" class="form-control" cols="30" rows="10"
                                placeholder="Here goes article's description"></textarea>
                        </div>
                        <div class="mb-3">
                                <label class="form-label" >Links</label>
                                <input type="text" class="form-control" placeholder="https://example.com" name="links" required>
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
