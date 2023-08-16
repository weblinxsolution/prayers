@extends('Admin.layout.main')

@section('admin')
    <style>
        .modal-backdrop {
            display: none;
        }
    </style>
    <!-- Start app main Content -->
    <!-- Start app main Content -->
    <div class="main-content">
        <section class="section">
            <div class="row mb-5">
                <div class="col-6">
                    <h2>
                        Articles
                    </h2>
                </div>
                <div class="col-6 text-right">
                    <a href="{{ Route('admin.addArticle') }}" class="btn btn-primary">Add Article</a>
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
                                            Title</th>
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
                                            Status</th>
                                        <th class="no-content sorting text-center" tabindex="0"
                                            aria-controls="zero-config" rowspan="1" colspan="1"
                                            aria-label="Action: activate to sort column ascending" style="width: 57px;">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($articles as $article)
                                        <tr role="row">
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="sorting_1">{{ $article->title }}</td>
                                            <td class="sorting_1">
                                                {{ \Illuminate\Support\Str::limit($article->description, 90, $end = '...') }}
                                            </td>

                                            <td class="sorting_1">
                                                <img src="{{ asset('articles/' . $article->image) }}" width="50px"
                                                    alt="">
                                            </td>

                                            <td class="sorting_1">
                                                @if ($article->status == '1')
                                                    <button class="btn btn-outline-success btn-sm">Active</button>
                                                @else
                                                    <button class="btn btn-outline-info btn-sm">Deactive</button>
                                                @endif
                                            </td>
                                            <td>
                                                <div
                                                    style="display: flex; justify-content: space-evenly ; align-items: center">
                                                    <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                                                        data-bs-target="#myModalDetails{{ $loop->iteration }}">Details</button>
                                                    <a href="{{ Route('admin.edit.article', ['id' => $article->id]) }}"
                                                        class="btn btn-outline-primary btn-sm">Edit</a>
                                                    @if ($article->status == '1')
                                                        <a href="{{ Route('update.articleStatus', ['id' => $article->id]) }}"
                                                            class="btn btn-outline-info btn-sm">Deactive</a>
                                                    @else
                                                        <a href="{{ Route('update.articleStatus', ['id' => $article->id]) }}"
                                                            class="btn btn-outline-success btn-sm">Active</a>
                                                    @endif
                                                    <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                                        data-bs-target="#myModal{{ $loop->iteration }}">Delete</button>
                                                </div>
                                            </td>
                                        </tr>


                                        <!-- delete -->

                                        <div class="modal fade" id="myModal{{ $loop->iteration }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to delete the article
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <a href="{{ Route('admin.delete.article', ['id' => $article->id]) }}"
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
                                                        <h4>{{ $article->title }} Details</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-2">
                                                                Link
                                                            </div>
                                                            <div class="col-10">
                                                                {{ $article->links }}
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-3">
                                                                Created at
                                                            </div>
                                                            <div class="col-4">
                                                                {{ \Carbon\Carbon::parse($article->created_at)->format('d/F/Y')}}
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-3">
                                                                Updated at
                                                            </div>
                                                            <div class="col-4">
                                                                {{ \Carbon\Carbon::parse($article->updated_at)->format('d/F/Y')}}
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
                    {{-- pagination --}}
                    <div class="card-footer text-right">
                        <nav class="d-inline-block">
                            <ul class="pagination mb-0">
                                {!! $articles->links('vendor.pagination.bootstrap-4') !!}
                            </ul>
                        </nav>
                    </div>
                </div>
                <a href="{{ Route('admin.clearCache') }}" class="btn btn-primary ">Clear Cache</a>
            </div>
        </section>
    </div>

    <!-- Start app Footer part -->
@endsection
