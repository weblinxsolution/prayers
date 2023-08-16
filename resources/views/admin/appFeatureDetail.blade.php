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
                                        aria-label="Name: activate to sort column descending" style="width: 10px;">
                                        Sno</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="zero-config" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending" style="width: 150px;">
                                        Button Link Androaid</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="zero-config" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending" style="width: 150px;">
                                        Button link IOS</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="zero-config" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending" style="width: 114px;">
                                        Images</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="zero-config" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending" style="width: 114px;">
                                        Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr role="row">
                                    <td>1</td>
                                    <td class="sorting_1">{{ $appFeature->btn_link_androaid }}</td>
                                    <td class="sorting_1">
                                        {{ $appFeature->btn_link_ios }}
                                    </td>
                                    <td>
                                        <div class="row">
                                            @foreach ($featureImages as $image)
                                                <div class="col-6">
                                                    <img src="{{ asset('appFeatures/' . $image->images) }}" class="p-2"
                                                        alt="" width="100px">
                                                </div>
                                            @endforeach
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{ Route('admin.edit.feature', ['id' => $appFeature->id]) }}"
                                            class="btn btn-outline-primary">Edit</a>
                                        {{-- <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#myModal">Delete</button> --}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete the feature
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <a href="{{ Route('admin.delete.feature', ['id' => $appFeature->id]) }}"
                                            class="btn btn-danger">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>

    <!-- Start app Footer part -->
@endsection
