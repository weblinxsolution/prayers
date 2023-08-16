@extends('Admin.layout.main')

@section('admin')
    <!-- Start app main Content -->
    <!-- Start app main Content -->
    <div class="main-content">
        <div class="row mb-3">
            <div class="col-6">
                <h2>
                    Add Banner
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
                <form action="{{ Route('admin.add.banner.data') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="formrow-email-input">Select Type</label>
                        <select name="type" id="type" class="form-control">
                            <option value="" selected disabled>Please select type!</option>
                            <option value="image_type">Image Type</option>
                            <option value="native_type">Native Type</option>
                        </select>
                    </div>

                    <div id="image" style="display: none">
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label" for="formrow-email-input">Image</label>
                                <input type="file" class="form-control" placeholder="" name="image" >
                            </div>
                            <div class="col-6">
                                <label class="form-label" for="formrow-email-input">Link</label> <span>(optional)</span>
                                <input type="text" class="form-control" placeholder="Enter link" name="link" >
                            </div>
                        </div>
                    </div>
                    <div id="data" style="display: none">
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label" for="formrow-email-input">Title</label>
                                <input type="text" class="form-control" placeholder="Enter title" name="title"
                                    >
                            </div>
                            <div class="col-6">
                                <label class="form-label" for="formrow-email-input">Sub title</label>
                                <input type="text" class="form-control" placeholder="Enter sub title" name="sub_title">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label" for="formrow-email-input">Image</label>
                                <input type="file" class="form-control" name="native_image" >
                            </div>
                            <div class="col-6">
                                <label class="form-label" for="formrow-email-input">Link</label> <span>(optional)</span>
                                <input type="text" class="form-control" placeholder="Enter link" name="native_link" >
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

    <script>
        $(document).ready(function() {
            $('#type').change(function() {
                var type = $(this).val();
                if (type === 'image_type') {
                    $('#data').hide();
                    $('#image').show();
                } else if (type === 'native_type') {
                    $('#image').hide();
                    $('#data').show();
                }
            })
        });
    </script>
    <!-- Start app Footer part -->
@endsection
