@extends('Admin.layout.main')

@section('admin')
    <!-- Start app main Content -->
    <!-- Start app main Content -->
    <div class="main-content">
        <div class="row mb-5">
            <div class="col-6">
                <h2>
                    Playlist
                </h2>
            </div>
            <div class="col-6 text-right">
                <a href="{{ Route('admin.addPlaylist') }}" class="btn btn-primary">Add playlist</a>
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
                                        colspan="1" style="width: 60px !important" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending" style="width: 114px;">
                                        Sno</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="zero-config" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending" style="width: 114px;">
                                        Name</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="zero-config" rowspan="1"
                                        colspan="1" style="width: 200px !important" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending" style="width: 114px;">
                                        Description</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="zero-config" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending" style="width: 114px;">
                                        Image</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="zero-config" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending" style="width: 114px;">
                                        Created at</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="zero-config" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending" style="width: 114px;">
                                        Updated at</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="zero-config" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending" style="width: 114px;">
                                        Status</th>
                                    <th class="no-content sorting" tabindex="0" aria-controls="zero-config" rowspan="1"
                                        colspan="1" aria-label="Action: activate to sort column ascending"
                                        style="width: 57px;">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($playlists as $playlist)
                                    <tr role="row">
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="sorting_1">{{ $playlist->name }}</td>
                                        <td class="sorting_1">
                                            {{ \Illuminate\Support\Str::limit($playlist->description, 100, $end = '...') }}
                                        </td>
                                        <td class="sorting_1">
                                            <img src="{{ asset('playlistImages/' . $playlist->image) }}" width="100px"
                                                alt="">

                                        </td>
                                        <td class="sorting_1">
                                            {{ \Carbon\Carbon::parse($playlist->created_at)->format('d/F/Y') }}
                                        </td>
                                        <td class="sorting_1">
                                            {{ \Carbon\Carbon::parse($playlist->updated_at)->format('d/F/Y') }}
                                        </td>
                                        <td class="sorting_1">
                                            @if ($playlist->status == '1')
                                                <button class="btn btn-outline-success btn-sm">Active</button>
                                            @else
                                                <button class="btn btn-outline-info btn-sm">Deactive</button>
                                            @endif
                                        </td>
                                        <td>
                                            <div style="display: flex; gap: 8px;">
                                                <a href="{{ Route('admin.adjustPlaylist', ['id' => $playlist->id]) }}"
                                                    class="btn btn-outline-primary btn-sm">
                                                    <i class="fa-solid fa-arrows-up-down-left-right"></i> Adjust Tracks
                                                </a>
                                                <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#myModal{{ $loop->iteration }}">Actions</button>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Modal -->
                                    <div class="modal fade" id="myModal{{ $loop->iteration }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                </div>
                                                <div class="modal-body text-center">
                                                    <strong> Catuation!</strong> any action performed can not be undo!
                                                    <div class="row mt-5 d-flex justify-content-center align-item-center">
                                                        <div class="col-2">
                                                            <a href="{{ Route('admin.edit.playlist', ['id' => $playlist->id]) }}"
                                                                class="btn btn-outline-primary">Edit</a>
                                                        </div>
                                                        <div class="col-3">
                                                            @if ($playlist->status == '1')
                                                                <a href="{{ Route('admin.playliststatusD', ['id' => $playlist->id]) }}"
                                                                    class="btn btn-outline-info">Deactive</a>
                                                            @else
                                                                <a href="{{ Route('admin.playliststatusA', ['id' => $playlist->id]) }}"
                                                                    class="btn btn-outline-success">Active</a>
                                                            @endif
                                                        </div>
                                                        <div class="col-3">
                                                            <a href="{{ Route('admin.delete.tracks', ['id' => $playlist->id]) }}"
                                                                class="btn btn-danger"
                                                                onclick="return confirm('Are you sure you want to delete all tracks of this playlist');">Delete
                                                                Tracks</a>
                                                        </div>
                                                        <div class="col-2">
                                                            <a href="{{ Route('admin.delete.playlist', ['id' => $playlist->id]) }}"
                                                                class="btn btn-danger"
                                                                onclick="return confirm('Are you sure you want to delete playlist')">Delete</a>
                                                        </div>
                                                    </div>
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
                {{-- pagination --}}
                <div class="card-footer text-right">
                    <nav class="d-inline-block">
                        <ul class="pagination mb-0">
                            {!! $playlists->links('vendor.pagination.bootstrap-4') !!}
                        </ul>
                    </nav>
                </div>

            </div>
            <a href="{{ Route('admin.clearCache') }}" class="btn btn-primary ">Clear Cache</a>
        </div>

    </div>

    <!-- Start app Footer part -->
@endsection
