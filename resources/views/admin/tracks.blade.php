@extends('Admin.layout.main')

@section('admin')
    <!-- Start app main Content -->
    <div class="main-content">
        <div class="row mb-5">
            <div class="col-6">
                <h2>
                    {{ $title }}
                </h2>
            </div>
            <div class="col-6 text-right">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myAdd">Add Track</button>
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

            <div class="card">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table id="zero-config" class="table table-striped table-md v_center" role="grid"
                            aria-describedby="zero-config_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="zero-config" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending" style="width: 60px;">
                                        Sno</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="zero-config" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending" style="width: 114px;">
                                        Name</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="zero-config" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending" style="width: 200px;">
                                        Description</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="zero-config" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending" style="width: 114px;">
                                        Image</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="zero-config" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending" style="width: 114px;">
                                        Status</th>
                                    <th class="no-content sorting text-center" tabindex="0" aria-controls="zero-config"
                                        rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending"
                                        style="width: 57px;">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tracks as $track)
                                    <tr role="row">
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="sorting_1">{{ $track->name }}</td>
                                        <td class="sorting_1">
                                            {{ \Illuminate\Support\Str::limit($track->description, 90, $end = '...') }}
                                        </td>
                                        <td class="sorting_1">
                                            @if ($track->image === 'default')
                                                @php
                                                    $playImage = App\Models\playlists::find($track->playlist_id);
                                                @endphp
                                                <img src="{{ asset('playlistImages/' . $playImage->image) }}" width="100px"
                                                    alt="">
                                            @else
                                                <img src="{{ asset('trackImages/' . $track->image) }}" width="100px"
                                                    alt="">
                                            @endif
                                        </td>

                                        <td class="sorting_1">
                                            @if ($track->status == '1')
                                                <button class="btn btn-outline-success btn-sm">Active</button>
                                            @else
                                                <button class="btn btn-outline-info btn-sm">Deactive</button>
                                            @endif
                                        </td>
                                        <td>
                                            <div style="display: flex; gap: 4px;">
                                                <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#myModalDetails{{ $loop->iteration }}">Details</button>
                                                <button type="button" data-bs-toggle="modal"
                                                    data-bs-target="#myedit{{ $loop->iteration }}"
                                                    class="btn btn-outline-primary btn-sm">Edit</button>
                                                @if ($track->status == '1')
                                                    <a href="{{ Route('update.TrackStatus', ['id' => $track->id]) }}"
                                                        class="btn btn-outline-info btn-sm">Deactive</a>
                                                @else
                                                    <a href="{{ Route('update.TrackStatus', ['id' => $track->id]) }}"
                                                        class="btn btn-outline-success btn-sm">Active</a>
                                                @endif
                                                <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#myModal{{ $loop->iteration }}">Delete</button>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- delete Modal -->
                                    <div class="modal fade" id="myModal{{ $loop->iteration }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                </div>
                                                <div class="modal-body text-center">
                                                    <strong> Catuation!</strong> any action performed can not be undo!
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="{{ Route('admin.delete.track', ['id' => $track->id]) }}"
                                                        class="btn btn-danger">Delete</a>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- edit --}}
                                    <div class="modal fade" id="myedit{{ $loop->iteration }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ Route('admin.edit.track', ['id' => $track->id]) }}"
                                                        method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="my-input">Name</label>
                                                                    <input id="my-input" class="form-control"
                                                                        type="text" value="{{ $track->name }}"
                                                                        name="name">
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="my-input">Select Playlist</label>
                                                                    <select name="playlist" id=""
                                                                        class="form-control">
                                                                        <option disabled>Please select a playlist !</option>
                                                                        @foreach ($playlists as $playlist)
                                                                            <option value="{{ $playlist->id }}"
                                                                                {{ $playlist->id == $track->playlist_id ? 'selected' : '' }}>
                                                                                {{ $playlist->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="my-input">Description</label>
                                                            <span>(Optional)</span>
                                                            <textarea name="desc" class="form-control" id="" cols="30" rows="10">{{ $track->description }}</textarea>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="my-input">Image</label>
                                                                    <input id="my-input" class="form-control"
                                                                        type="file" name="image">
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="my-input">Audio URL's</label>
                                                                    <input type="text"
                                                                        placeholder="Enter the audio url" name="audio"
                                                                        class="form-control"
                                                                        value="{{ $track->audio_url }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-3">
                                                                <div class="form-group">
                                                                    <div class="control-label">Default image</div>
                                                                    <label class="custom-switch mt-2">
                                                                        <input type="checkbox" name="defaultimg"
                                                                            class="custom-switch-input"
                                                                            {{ $track->image == 'default' ? 'checked' : '' }}>
                                                                        <span class="custom-switch-indicator"></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <div class="form-group ">
                                                                    <div class="control-label">Status</div>
                                                                    <label class="custom-switch mt-2">
                                                                        <input type="checkbox" name="status"
                                                                            class="custom-switch-input"
                                                                            {{ $track->status == '1' ? 'checked' : '' }}>
                                                                        <span class="custom-switch-indicator"></span>
                                                                        <span class="custom-switch-description">on</span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- view --}}
                                    <div class="modal fade" id="myModalDetails{{ $loop->iteration }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4>{{ $track->name }} Details</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-3">
                                                            Audio Links
                                                        </div>
                                                        <div class="col-4">
                                                            {{ $track->audio_url }}
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-3">
                                                            Created at
                                                        </div>
                                                        <div class="col-4">
                                                            {{ \Carbon\Carbon::parse($track->created_at)->format('d/F/Y') }}
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-3">
                                                            Updated at
                                                        </div>
                                                        <div class="col-4">
                                                            {{ \Carbon\Carbon::parse($track->updated_at)->format('d/F/Y') }}
                                                        </div>
                                                    </div>
                                                    <hr>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>

                {{-- add --}}
                <div class="modal fade" id="myAdd" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            </div>
                            <div class="modal-body">
                                <form action="{{ Route('admin.addTrackData') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="my-input">Name</label>
                                                <input id="my-input" class="form-control" type="text"
                                                    name="name">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="my-input">Select Playlist</label>
                                                <select name="playlist" id="" class="form-control">
                                                    <option value="" selected disabled>Please select a playlist !
                                                    </option>
                                                    @foreach ($playlists as $playlist)
                                                        <option value="{{ $playlist->id }}">
                                                            {{ $playlist->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="my-input">Description</label>
                                        <span>(Optional)</span>
                                        <textarea name="desc" class="form-control" id="" cols="30" rows="10"></textarea>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="my-input">Image</label>
                                                <input id="my-input" class="form-control" type="file"
                                                    name="image">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="my-input">Audio URL's</label>
                                                <input type="text" placeholder="Enter the audio url" name="audio"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="control-label">Default image</div>
                                        <label class="custom-switch mt-2">
                                            <input type="checkbox" name="defaultimg" class="custom-switch-input defaultImage">
                                            <span class="custom-switch-indicator"></span>
                                        </label>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>


                {{-- pagination --}}
                <div class="card-footer text-right">
                    <nav class="d-inline-block">
                        <ul class="pagination mb-0">
                            {!! $tracks->links('vendor.pagination.bootstrap-4') !!}
                        </ul>
                    </nav>
                </div>

            </div>
            <a href="{{ Route('admin.clearCache') }}" class="btn btn-primary ">Clear Cache</a>
        </div>

    </div>

    <script>
        $('.defaultImage').click(function(){
          var val =   $(this).val();
            if(val == 'on')
            {
                $('.image').hide();
            }else{
                $('.image').show();
            }
        })
    </script>

    <!-- Start app Footer part -->
@endsection
