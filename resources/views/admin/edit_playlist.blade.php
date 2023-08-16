@extends('Admin.layout.main')

@section('admin')
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
                <form action="{{ Route('admin.editPlaylistData', ['id' => $playlist->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="formrow-email-input">Name</label>
                        <input type="text" class="form-control" placeholder="Enter playlist name"
                            value="{{ $playlist->name }}" name="name" required>
                    </div>


                    <div class="form-group">
                        <label for="my-input">Description <span class="text-danger">(Optional)</span></label>
                        <textarea name="desc" class="form-control" cols="30" rows="10" placeholder="Here goes playlists's description">{{ $playlist->description }}</textarea>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="formrow-email-input">Image</label>
                                <input type="file" class="form-control" name="image" >
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <div class="control-label">Status</div>
                                <label class="custom-switch mt-2">
                                    <input type="checkbox" name="status" class="custom-switch-input"
                                        {{ $playlist->status == '1' ? 'checked' : '' }}>
                                    <span class="custom-switch-indicator"></span>
                                    <span class="custom-switch-description">on</span>
                                </label>
                            </div>
                        </div>
                    </div>


                    {{-- start preview --}}
                    <div>
                        <img src="{{ asset('playlistImages/' . $playlist->image) }}" width="200px" alt="">
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
