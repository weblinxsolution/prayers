@extends('Admin.layout.main')

@section('admin')
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.js"></script>


    <div class="main-content">
        <div class="row mb-5">
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

            <p>Drag and Drop any track to move it to any desired location </p>
            <div class="card">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <form action="{{ Route('admin.rearrangeTracks') }}" method="POST">
                            @csrf
                            <table id="zero-config table1" class="table table-striped table-md v_center" role="grid"
                                aria-describedby="zero-config_info">
                                <thead>
                                    <tr role="row">
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
                                            Audio Url</th>

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
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tracks as $track)
                                        <tr role="row">
                                            <input type="hidden" name="position[]" value="track{{ $loop->iteration }}">
                                            <input type="hidden" name="name[]" value="{{ $track->name }}">
                                            <input type="hidden" name="playlist_id" value="{{ $track->playlist_id }}">
                                            <input type="hidden" name="description[]" value="{{ $track->description }}">
                                            <input type="hidden" name="image[]" value="{{ $track->image }}">
                                            <input type="hidden" name="audio_url[]" value="{{ $track->audio_url }}">
                                            <input type="hidden" name="status[]" value="{{ $track->status }}">
                                            <input type="hidden" name="created_at[]" value="{{ $track->created_at }}">
                                            <input type="hidden" name="updated_at[]" value="{{ $track->updated_at }}">
                                            <td class="sorting_1">{{ $track->name }}</td>
                                            <td class="sorting_1">
                                                {{ \Illuminate\Support\Str::limit($track->description, 100, $end = '...') }}
                                            </td>
                                            <td class="sorting_1">
                                                @if ($track->image === 'default')
                                                    @php
                                                        $playImage = App\Models\playlists::find($track->playlist_id);
                                                    @endphp
                                                    <img src="{{ asset('playlistImages/' . $playImage->image) }}"
                                                        width="100px" alt="">
                                                @else
                                                    <img src="{{ asset('trackImages/' . $track->image) }}" width="100px"
                                                        alt="">
                                                @endif
                                            </td>
                                            <td class="sorting_1">
                                                {{ $track->audio_url }}
                                            </td>
                                            <td class="sorting_1">
                                                {{ \Carbon\Carbon::parse($track->created_at)->format('d/F/Y') }}
                                            </td>
                                            <td class="sorting_1">
                                                {{ \Carbon\Carbon::parse($track->updated_at)->format('d/F/Y') }}
                                            </td>
                                            <td class="sorting_1">
                                                @if ($track->status == '1')
                                                    <button type="button" class="btn btn-outline-success btn-sm">Active</button>
                                                @else
                                                    <button type="button" class="btn btn-outline-info btn-sm">Deactive</button>
                                                @endif
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="text-center mt-5 mb-3">
                                <button type="submit" class="btn btn-primary btn-lg" onclick="return confirm('Are you sure you want to rearrange tracks !')">
                                    Rearrange
                                </button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <script>
        $('tbody').sortable();
        console.log($('tr'));
    </script>
    <!-- Start app Footer part -->
@endsection
