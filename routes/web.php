<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('admin/loginCheck', [AdminController::class, 'login_check'])->name('admin.loginCheck');

Route::middleware('admin')->prefix('admin')->group(function () {

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');


    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Complete crud for admins

    Route::get('/listOfAdmins', [AdminController::class, 'list_admins'])->name('listAdmins');
    Route::get('/addAdmin', [AdminController::class, 'add_admin'])->name('add.admin');
    Route::post('/addAdminData', [AdminController::class, 'add_admin_data'])->name('add.admin.data');

    Route::get('/editAdmin/{id}', [AdminController::class, 'edit_admin'])->name('edit.admin');
    Route::post('/editAdminData/{id}', [AdminController::class, 'edit_admin_data'])->name('edit.admin.data');

    Route::get('/deleteAdmin/{id}', [AdminController::class, 'delete_admin'])->name('delete.admin');

    Route::get('/updateAdminStatus/{id}', [AdminController::class, 'update_admin_status'])->name('update.adminStatus');


    // end admin crud

    // Complete crud for articles management
    Route::get('/listOfArticles', [AdminController::class, 'list_articles'])->name('admin.listArticles');
    Route::get('/addArticle', [AdminController::class, 'add_article'])->name('admin.addArticle');
    Route::post('/addArticleData', [AdminController::class, 'add_article_data'])->name('admin.add.article.data');

    Route::get('/editArticle/{id}', [AdminController::class, 'edit_article'])->name('admin.edit.article');
    Route::post('/editArticleData/{id}', [AdminController::class, 'edit_article_data'])->name('admin.edit.article.data');

    Route::get('/deleteArticle/{id}', [AdminController::class, 'delete_article'])->name('admin.delete.article');

    Route::get('/updateArticleStatus/{id}', [AdminController::class, 'update_article_status'])->name('update.articleStatus');
    // end article crud

    // Complete crud for articles management
    Route::get('/listOfQuote', [AdminController::class, 'list_quotes'])->name('admin.listquote');
    Route::get('/addQuote', [AdminController::class, 'add_quote'])->name('admin.addQuote');
    Route::post('/addQuoteData', [AdminController::class, 'add_quote_data'])->name('admin.add.quote.data');

    Route::get('/editQuote/{id}', [AdminController::class, 'edit_quote'])->name('admin.edit.quote');
    Route::post('/editQuoteData/{id}', [AdminController::class, 'edit_quote_data'])->name('admin.edit.quote.data');

    Route::get('/deleteQuote/{id}', [AdminController::class, 'delete_quote'])->name('admin.delete.quote');

    Route::get('/updateQuoteStatus/{id}', [AdminController::class, 'update_quote_status'])->name('update.QuoteStatus');

    // end article crud

    // Complete crud for app features management

    Route::get('/listOfAppFeatures', [AdminController::class, 'list_appFeatures'])->name('admin.appFeatures');
    Route::get('/DetailsOfAppFeatures/{id}', [AdminController::class, 'featureDetails'])->name('admin.featureDetails');
    Route::get('/addAppFeatures', [AdminController::class, 'add_appFeatures'])->name('admin.addfeature');

    Route::post('/addAppFeaturesData', [AdminController::class, 'add_appFeatures_data'])->name('admin.add.feature.data');
    Route::get('/editFeature/{id}', [AdminController::class, 'edit_appFeatures'])->name('admin.edit.feature');
    Route::post('/editFeatureData/{id}', [AdminController::class, 'edit_appFeatures_data'])->name('admin.edit.feature.data');

    Route::get('/deleteFeature/{id}', [AdminController::class, 'delete_feature'])->name('admin.delete.feature');

    Route::get('/updateFeatureStatus/{id}', [AdminController::class, 'update_feature_status'])->name('update.featureStatus');

    // end features management crud


    //Complete crud for banner adds
    Route::get('/listOfBannerAdds', [AdminController::class, 'list_bannerAdds'])->name('admin.bannerAdds');

    Route::get('/addBannerAdds', [AdminController::class, 'add_bannerAdds'])->name('admin.addBanner');
    Route::post('/addBannerAddsData', [AdminController::class, 'add_banner_data'])->name('admin.add.banner.data');

    Route::get('/bannerDetails/{id}', [AdminController::class, 'banner_details'])->name('admin.bannerDetails');

    Route::get('/edtiBanner/{id}', [AdminController::class, 'edit_baner'])->name('admin.edit.banner');
    Route::post('/editBannerData/{id}', [AdminController::class, 'edit_banerData'])->name('admin.edit.banner.data');

    Route::get('/deleteBannerData/{id}', [AdminController::class, 'delete_banerData'])->name('admin.delete.banner');

    Route::get('/updateBannerStatus/{id}', [AdminController::class, 'update_banner_status'])->name('update.bannerStatus');

    // end features management crud

    //Complete crud for regions

    Route::get('/listOfRegions', [AdminController::class, 'list_regions'])->name('admin.regions');

    Route::get('/addRegion', [AdminController::class, 'add_region'])->name('admin.addregion');
    Route::post('/addRegionData', [AdminController::class, 'add_regionData'])->name('admin.add.region.data');

    Route::get('/editRegion/{id}', [AdminController::class, 'edit_region'])->name('admin.edit.region');
    Route::post('/editRegionData/{id}', [AdminController::class, 'edit_regionData'])->name('admin.edit.regionData');

    Route::get('/deleteRegionData/{id}', [AdminController::class, 'delete_regionData'])->name('admin.delete.regionData');

    Route::get('/updateRegionStatus/{id}', [AdminController::class, 'update_region_status'])->name('update.RegionStatus');



    //end crud for regions

    //Complete crud for countries
    Route::get('/listOfCountries', [AdminController::class, 'list_countries'])->name('admin.countries');

    Route::get('/addCountries', [AdminController::class, 'add_countries'])->name('admin.addcountry');
    Route::post('/addCountriesData', [AdminController::class, 'add_countriesData'])->name('admin.add.country.data');

    Route::get('/editCountry/{id}', [AdminController::class, 'edit_country'])->name('admin.edit.country');
    Route::post('/editCountryData/{id}', [AdminController::class, 'edit_countryData'])->name('admin.edit.countryData');

    Route::get('/deleteCountryData/{id}', [AdminController::class, 'delete_countryData'])->name('admin.delete.countryData');

    Route::get('/updateCountryStatus/{id}', [AdminController::class, 'update_country_status'])->name('update.CountryStatus');


    // end countries

    //Complete crud for cities
    Route::get('/listOfCities', [AdminController::class, 'list_cities'])->name('admin.cities');

    Route::get('/addCity', [AdminController::class, 'add_city'])->name('admin.addcity');
    Route::post('/addCityData', [AdminController::class, 'add_cityData'])->name('add.citiesData');

    Route::get('/editCity/{id}', [AdminController::class, 'edit_city'])->name('admin.edit.city');
    Route::post('/editCityData/{id}', [AdminController::class, 'edit_cityData'])->name('admin.editCitiesData');

    Route::get('/deleteCityData/{id}', [AdminController::class, 'delete_cityData'])->name('admin.deleteCity');

    Route::get('/updateCityStatus/{id}', [AdminController::class, 'update_city_status'])->name('update.CityStatus');

    // end cities

    // Complete crud for play list
    Route::get('/playlists', [AdminController::class, 'playlist'])->name('admin.playlist');
    Route::get('/addPlaylists', [AdminController::class, 'add_playlist'])->name('admin.addPlaylist');
    Route::post('/addPlaylistData', [AdminController::class, 'add_playlistData'])->name('admin.addPlaylistData')
    ;
    Route::get('/editPlaylist/{id}', [AdminController::class, 'edit_playlist'])->name('admin.edit.playlist');
    Route::post('/editPlaylistData/{id}', [AdminController::class, 'edit_playlistData'])->name('admin.editPlaylistData');

    Route::get('/deletePlaylistData/{id}', [AdminController::class, 'delete_playlistData'])->name('admin.delete.playlist');
    Route::get('/deletePlaylistTrackData/{id}', [AdminController::class, 'delete_playlistTrackData'])->name('admin.delete.tracks');

    Route::get('/playlistStatusd/{id}', [AdminController::class, 'status_playlistd'])->name('admin.playliststatusD');
    Route::get('/playlistStatusa/{id}', [AdminController::class, 'status_playlista'])->name('admin.playliststatusA');

    // playlist crud ends
    Route::get('/tracks', [AdminController::class, 'tracks'])->name('admin.tracks');

    Route::post('/addTrackData', [AdminController::class, 'add_tracksData'])->name('admin.addTrackData');

    Route::post('/editTrackData/{id}', [AdminController::class, 'edit_tracksData'])->name('admin.edit.track');

    Route::get('/deleteTrackData/{id}', [AdminController::class, 'delete_tracksData'])->name('admin.delete.track');

    Route::get('/updateTrackStatus/{id}', [AdminController::class, 'update_track_status'])->name('update.TrackStatus');

    // Track position Testing
    // Route::post('/testting', [AdminController::class, 'checkingTracks'])->name('testing');
    Route::post('/rearrangeTracks', [AdminController::class, 'rearrangeTracks'])->name('admin.rearrangeTracks');

    // complete tracks crud

    //end trac crud

    // admin profile
    Route::get('/profile/{id}', [AdminController::class, 'profile_page'])->name('admin.profile');
    Route::post('/profileEdit/{id}', [AdminController::class, 'profile_edit'])->name('admin.editProfile');
    Route::post('/profileEdit/{id}', [AdminController::class, 'profile_edit'])->name('admin.editProfile');

    Route::get('/adjustTracks/{id}', [AdminController::class, 'adjustTracks'])->name('admin.adjustPlaylist');

    //
    Route::get('/clearCache', [AdminController::class, 'clearCache'])->name('admin.clearCache');
});

Route::get('/', function(){
    return view('index');
});