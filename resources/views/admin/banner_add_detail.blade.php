@extends('Admin.layout.main')

@section('admin')
    <!-- Start app main Content -->
    <!-- Start app main Content -->
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

            <div class="card">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table id="zero-config" class="table table-striped table-md v_center" role="grid"
                            aria-describedby="zero-config_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="zero-config" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending" style="width: 114px;">
                                        Sno</th>
                                    @if ($banners->type == 'image_type')
                                        <th class="sorting_asc" tabindex="0" aria-controls="zero-config" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending" style="width: 114px;">
                                            Image</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="zero-config" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending" style="width: 114px;">
                                            link</th>
                                    @elseif($banners->type == 'native_type')
                                        <th class="sorting_asc" tabindex="0" aria-controls="zero-config" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending" style="width: 114px;">
                                            Title</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="zero-config" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending" style="width: 114px;">
                                            Sub Title</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="zero-config" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending" style="width: 114px;">
                                            Image</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="zero-config" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending" style="width: 114px;">
                                            link</th>
                                    @endif
                                    <th class="sorting_asc" tabindex="0" aria-controls="zero-config" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending" style="width: 114px;">
                                        Created at</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="zero-config" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending" style="width: 114px;">
                                        Updated at</th>
                                    <th class="no-content sorting" tabindex="0" aria-controls="zero-config" rowspan="1"
                                        colspan="1" aria-label="Action: activate to sort column ascending"
                                        style="width: 57px;">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr role="row">
                                        <td>1</td>
                                        @if($banners->type == 'image_type')
                                        <td>
                                            <img src="{{ asset('bannerAdds/'. $banners->image_type) }}" alt="" width="100px">
                                        </td>
                                        <td>{{ $banners->link }}</td>
                                        @elseif($banners->type == 'native_type')
                                        <td>{{ $banners->title }}</td>
                                        <td>{{ $banners->sub_title }}</td>
                                        <td>
                                            <img src="{{ asset('bannerAdds/'. $banners->native_image) }}" alt="" width="100px">
                                        </td>
                                        <td>{{ $banners->native_link }}</td>
                                        @endif
                                        <td> {{ \Carbon\Carbon::parse($banners->created_at)->format('d/F/Y') }}</td>
                                        <td> {{ \Carbon\Carbon::parse($banners->updated_at)->format('d/F/Y') }}</td>
                                        <td>
                                            <div style="display: flex; gap: 8px;">
                                                <a href="{{ Route('admin.edit.banner', ['id' => $banners->id]) }}"
                                                    class="btn btn-outline-primary btn-sm">Edit</a>
                                                <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#myModal">Delete</button>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Modal -->
                                    <div class="modal fade" id="myModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete the banner
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <a href="{{ Route('admin.delete.banner', ['id' => $banners->id]) }}"
                                                        class="btn btn-danger">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </tbody>
                        </table>

                    </div>
                </div>


            </div>
        </div>

    </div>

    <!-- Start app Footer part -->
@endsection
