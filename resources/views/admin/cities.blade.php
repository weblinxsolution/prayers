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
            <div class="col-6 text-right">
                <a href="{{ Route('admin.addcity') }}" class="btn btn-primary">Add City</a>
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
                                    <th class="sorting_asc" tabindex="0" aria-controls="zero-config" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending" style="width: 114px;">
                                        Name</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="zero-config" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending" style="width: 114px;">
                                        Country</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="zero-config" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending" style="width: 114px;">
                                        Capital</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="zero-config" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending" style="width: 114px;">
                                        Status</th>
                                    <th class="no-content sorting text-center" tabindex="0" aria-controls="zero-config" rowspan="1"
                                        colspan="1" aria-label="Action: activate to sort column ascending"
                                        style="width: 57px;">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cities as $city)
                                    <tr role="row">
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="sorting_1">{{ ucfirst($city->name) }}</td>
                                        <td class="sorting_1">{{ ucfirst($city->countries->name) }}</td>
                                        <td class="sorting_1">
                                            {{ $city->is_capital == '1' ? 'It is a capital' : 'It is not a capital' }}
                                        </td>

                                        <td class="sorting_1">
                                            @if ($city->status == '1')
                                                <button class="btn btn-outline-success btn-sm">Active</button>
                                            @else
                                                <button class="btn btn-outline-info btn-sm">Deactive</button>
                                            @endif
                                        </td>

                                        <td>
                                            <div style=" display: flex; justify-content: space-evenly ; align-items: center">
                                                <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#myModalDetails{{ $loop->iteration }}">Details</button>
                                                <a href="{{ Route('admin.edit.city', ['id' => $city->id]) }}"
                                                    class="btn btn-outline-primary btn-sm">Edit</a>
                                                    @if ($city->status == '1')
                                                    <a href="{{ Route('update.CityStatus', ['id' => $city->id]) }}"
                                                        class="btn btn-outline-info btn-sm">Deactive</a>
                                                @else
                                                    <a href="{{ Route('update.CityStatus', ['id' => $city->id]) }}"
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
                                                <div class="modal-body">
                                                    Are you sure you want to delete the city
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <a href="{{ Route('admin.deleteCity', ['id' => $city->id]) }}"
                                                        class="btn btn-danger">Delete</a>
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
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-3">
                                                           Country code
                                                        </div>
                                                        <div class="col-4">
                                                           {{ $city->country_code }}
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-3">
                                                            Created at
                                                        </div>
                                                        <div class="col-4">
                                                            {{ \Carbon\Carbon::parse($city->created_at)->format('d/F/Y') }}
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-3">
                                                            Updated at
                                                        </div>
                                                        <div class="col-4">
                                                            {{ \Carbon\Carbon::parse($city->updated_at)->format('d/F/Y') }}
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
                            {!! $cities->links('vendor.pagination.bootstrap-4') !!}
                        </ul>
                    </nav>
                </div>
            </div>

            <a href="{{ Route('admin.clearCache') }}" class="btn btn-primary ">Clear Cache</a>
        </div>

    </div>

    <!-- Start app Footer part -->
@endsection
