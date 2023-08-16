@extends('Admin.layout.main')

@section('admin')
    @php
        $admins = count(App\Models\Admins::all()->where('status' , '1'));
        $articles = count(App\Models\articles::all()->where('status' , '1'));
        $quotes = count(App\Models\quotes::all()->where('status' , '1'));
        $reions = count(App\Models\regions::all()->where('status' , '1'));
        $countries = count(App\Models\countries::all()->where('status' , '1'));
        $cities = count(App\Models\cities::all()->where('status' , '1'));
        $playlist = count(App\Models\playlists::all()->where('status' , '1'));
        $tracks = count(App\Models\tracks::all()->where('status' , '1'));
        $features = count(App\Models\app_features::all()->where('status' , '1'));
        $banner = count(App\Models\banner_adds::all()->where('status' , '1'));
    @endphp
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Admins</h4>
                            </div>
                            <div class="card-body">
                                {{ $admins }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-info">
                            <i class=" far fa-solid fa-newspaper"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Articals</h4>
                            </div>
                            <div class="card-body">
                                {{ $articles }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-secondary">
                            <i class="far  fa-solid fa-quote-left"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Quote</h4>
                            </div>
                            <div class="card-body">
                                {{ $quotes }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="far  fa-solid fa-earth-europe"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Regions</h4>
                            </div>
                            <div class="card-body">
                                {{ $reions }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-light">
                            <i class="far fa-flag"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Countries</h4>
                            </div>
                            <div class="card-body">
                                {{ $countries }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="far fa-solid fa-city"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Cities</h4>
                            </div>
                            <div class="card-body">
                                {{ $cities }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-solid fa-play"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Playlist</h4>
                            </div>
                            <div class="card-body">
                                {{ $playlist }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-info">
                            <i class="far fa-solid fa-book-quran"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Tracks</h4>
                            </div>
                            <div class="card-body">
                                {{ $tracks }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-secondary">
                            <i class="far fa-solid fa-book-quran"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header" style="padding-top: 15px !important">
                                <h4>Total Feature Adds</h4>
                            </div>
                            <div class="card-body">
                                {{ $features }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="far fa-solid fa-book-quran"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header" style="padding-top: 15px !important">
                                <h4>Total Banner Adds</h4>
                            </div>
                            <div class="card-body">
                                {{ $banner }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
