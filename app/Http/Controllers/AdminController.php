<?php

namespace App\Http\Controllers;

use App\Models\admins;
use App\Models\app_features;
use App\Models\articles;
use App\Models\banner_adds;
use App\Models\cities;
use App\Models\countries;
use App\Models\feature_images;
use App\Models\playlists;
use App\Models\quotes;
use App\Models\feaure_images;
use App\Models\regions;
use App\Models\Testing;
use App\Models\tracks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Validation\Rules\Password;
use League\CommonMark\Extension\SmartPunct\Quote;
use PHPUnit\Framework\Constraint\IsEmpty;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function login()
    {
        $title = "Admin Login";
        $data = compact('title');
        return view('admin.login')->with($data);
    }

    public function login_check(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required",
        ]);

        $check = admins::where('email', $request->email)->first();

        if ($check) {
            if (Hash::check($request->password, $check->password)) {
                if ($check->role == 'super_admin') {
                    if ($check->status == '1') {
                        session()->put('super_admin_id', $check->id);
                        return redirect()->route('dashboard');
                    } else {
                        return redirect()->back()->with('error', 'Your account has been deactivated please contact with admin');
                    }
                } elseif ($check->role == 'admin') {
                    if ($check->status == '1') {
                        session()->put('admin_id', $check->id);
                        return redirect()->route('dashboard');
                    } else {
                        return redirect()->back()->with('error', 'Your account has been deactivated please contact with admin');
                    }
                }

            } else {
                return redirect()->back()->with('error', 'Please enter valid credentials.');
            }
        } else {
            return redirect()->back()->with('error', 'Please enter valid credentials.');
        }
    }
    public function logout()
    {
        //logout
        session()->forget('admin_id');
        return redirect()->route('admin.login')->with('success', 'You have been logedout !');
    }

    public function dashboard()
    {
        $title = "Dashboard";
        $data = compact('title');
        return view('admin.index');
    }
    public function list_admins()
    {
        $title = "List of admins";
        $admins = admins::paginate(10);
        $data = compact('title', 'admins');
        return view('admin.admins')->with($data);
    }
    public function add_admin()
    {
        $title = "Add admin";
        $data = compact('title');
        return view('admin.add_admin')->with($data);
    }
    public function add_admin_data(Request $request)
    {
        $request->validate([
            "name" => "required",
            "email" => "required|email",
            "password" => ["required", Password::min(8)->letters()],
            "role" => "required"
        ]);

        $check = admins::where('email', $request->email)->get();
        if ($check->isEmpty()) {
            $new = new admins;
            $new->name = $request->name;
            $new->email = $request->email;
            $new->password = Hash::make($request->password);
            $new->role = $request->role;
            $new->status = '1';

            $new->save();

            return redirect()->route('listAdmins')->with('success', 'Admin hasbeen added successfully');
        } else {
            return redirect()->back()->with('error', 'Email already exists! Please use different email');
        }

    }
    public function edit_admin($id)
    {
        $title = "Edit employee";
        $admins = admins::find($id);
        $data = compact('title', 'admins');
        return view('admin.edit_admin')->with($data);
    }
    public function edit_admin_data($id, Request $request)
    {
        $request->validate([
            "name" => "required",
            "email" => "required|email",
            "role" => "required"
        ]);
        $update = admins::find($id);
        $update->name = $request->name;
        $update->email = $request->email;
        $update->role = $request->role;
        if ($request->password) {
            $request->validate([
                "password" => ["required", Password::min(8)->letters()],
            ]);

            $update->password = Hash::make($request->password);
        }
        if ($request->status == 'on') {
            $update->status = '1';
        } elseif ($request->status == '') {
            $update->status = '0';
        }

        $update->save();
        return redirect()->route('listAdmins')->with('success', 'Admin has been edited successfully');
    }

    public function delete_admin($id)
    {
        $data = admins::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Admin has been deleted successfully !');
    }

    public function update_admin_status($id)
    {
        $update = admins::find($id);
        if ($update->status == '1') {
            $update->status = '0';
            $update->save();
            return redirect()->back()->with('success', 'Admin has been deactivated successfully');
        } elseif ($update->status == '0') {
            $update->status = '1';
            $update->save();
            return redirect()->back()->with('success', 'Admin has been activated successfully');
        }
    }



    // articles crud
    public function list_articles()
    {
        $title = "List of articles";
        $articles = articles::paginate(10);
        $data = compact('title', 'articles');
        return view('admin.articles')->with($data);
    }

    public function add_article()
    {
        $title = "Add article";
        $data = compact('title');
        return view('admin.add_article')->with($data);
    }

    public function add_article_data(Request $request)
    {
        // dd($request->all());
        $request->validate([
            "title" => "required",
            "image" => "required",
            "links" => "required",
        ]);

        $new = new articles;
        $new->title = $request->title;
        if ($request->desc != "") {
            $new->description = $request->desc;
        }
        $new->links = $request->links;
        $new->status = "1";

        if ($request->image) {
            $image = $request['image'];
            $imageName = Str::random(24) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/articles/'), $imageName);
            $new->image = $imageName;
        }
        $new->save();
        return redirect()->route('admin.listArticles')->with('success', 'Articles has been added sccessfully');
    }

    public function edit_article($id)
    {
        $title = "Edit article";
        $article = articles::find($id);
        $data = compact('title', 'article');
        return view('admin.edit_article')->with($data);
    }

    public function edit_article_data($id, Request $request)
    {
        $request->validate([
            "title" => "required",
            "links" => "required",
        ]);

        $update = articles::find($id);
        $update->title = $request->title;
        $update->description = $request->desc;
        $update->links = $request->links;
        if ($request->status == 'on') {
            $update->status = '1';
        } else {
            $update->status = '0';
        }

        if ($request->image) {
            $image = $request['image'];
            $imageName = Str::random(24) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/articles/'), $imageName);
            $update->image = $imageName;
        }

        $update->save();
        return redirect()->route('admin.listArticles')->with('success', 'Articles has been edited sccessfully');
    }

    public function delete_article($id)
    {
        $data = articles::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Article has been deleted successfully !');
    }

    public function update_article_status($id)
    {
        $update = articles::find($id);
        if ($update->status == '1') {
            $update->status = '0';
            $update->save();
            return redirect()->back()->with('success', 'Article has been deactivated successfully');
        } elseif ($update->status == '0') {
            $update->status = '1';
            $update->save();
            return redirect()->back()->with('success', 'Article has been activated successfully');
        }
    }


    //end articles crud

    // quote crud
    public function list_quotes()
    {
        $title = "List of Quotes";
        $quotes = quotes::paginate(10);
        $data = compact('title', 'quotes');
        return view('admin.quotes')->with($data);
    }

    public function add_quote()
    {
        $title = "Add quote";
        $data = compact('title');
        return view('admin.add_quote')->with($data);
    }

    public function add_quote_data(Request $request)
    {
        // dd($request->all());
        $request->validate([
            "title" => "required",
            "desc" => "required"
        ]);

        $new = new quotes;
        $new->title = $request->title;
        $new->description = $request->desc;

        $new->status = "1";

        $new->save();
        return redirect()->route('admin.listquote')->with('success', 'Quote has been added sccessfully');
    }

    public function edit_quote($id)
    {
        $title = "Edit quote";
        $quote = quotes::find($id);
        $data = compact('title', 'quote');
        return view('admin.edit_quote')->with($data);
    }

    public function edit_quote_data($id, Request $request)
    {
        $request->validate([
            "title" => "required",
            "desc" => "required"
        ]);

        $update = quotes::find($id);
        $update->title = $request->title;
        $update->description = $request->desc;

        if ($request->status == 'on') {
            $update->status = "1";
        } elseif ($request->status == '') {
            $update->status = "0";
        }

        $update->save();
        return redirect()->route('admin.listquote')->with('success', 'Quote has been edited sccessfully');
    }

    public function update_quote_status($id)
    {
        $update = quotes::find($id);
        if ($update->status == '1') {
            $update->status = '0';
            $update->save();
            return redirect()->back()->with('success', 'Quote has been deactivated successfully');
        } elseif ($update->status == '0') {
            $update->status = '1';
            $update->save();
            return redirect()->back()->with('success', 'Quote has been activated successfully');
        }
    }

    public function delete_quote($id)
    {
        $data = quotes::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Quote has been deleted successfully !');
    }
    //end quote crud


    // App Features crud
    public function list_appFeatures()
    {
        $title = "App Features";
        $features = app_features::with('feature_images')->paginate(10);

        $data = compact('title', 'features');
        return view('admin.appFeatures')->with($data);
    }


    public function add_appFeatures()
    {
        $title = "Add Feature";
        $data = compact('title');
        return view('admin.add_features')->with($data);
    }
    public function add_appFeatures_data(Request $request)
    {
        // dd($request->all());
        $request->validate([
            "title" => "required",
            "desc" => "required",
            "androaidLink" => "required",
            "iosLink" => "required",
        ]);

        $new = new app_features;
        $new->title = $request->title;
        $new->description = $request->desc;
        $new->btn_link_androaid = $request->androaidLink;
        $new->btn_link_ios = $request->iosLink;
        $new->status = '1';

        $new->save();

        $id = $new->id;

        if ($request->images) {

            foreach ($request->images as $image) {

                $imagesTable = new feature_images;
                $imagesTable->feature_id = $id;
                $imageName = Str::random(24) . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('appFeatures'), $imageName);
                $imagesTable->images = $imageName;
                $imagesTable->save();
            }
        }




        return redirect()->route('admin.appFeatures')->with('success', 'Feature has been added sccessfully');
    }

    public function featureDetails($id)
    {
        $title = "Feature details";
        $appFeature = app_features::find($id);
        $featureImages = feature_images::where('feature_id', $id)->get();
        $data = compact('title', 'appFeature', 'featureImages');

        return view('admin.appFeatureDetail')->with($data);
    }

    public function edit_appFeatures($id)
    {
        $title = 'Edit feature';
        $appFeature = app_features::find($id);
        $featureImages = feature_images::where('feature_id', $id)->get();
        $data = compact('title', 'appFeature', 'featureImages');
        return view('admin.edit_features')->with($data);
    }

    public function edit_appFeatures_data($id, Request $request)
    {
        $request->validate([
            "title" => "required",
            "desc" => "required",
            "androaidLink" => "required",
            "iosLink" => "required",
        ]);

        $update = app_features::find($id);
        $update->title = $request->title;
        $update->description = $request->desc;
        $update->btn_link_androaid = $request->androaidLink;
        $update->btn_link_ios = $request->iosLink;

        if ($request->status == 'on') {
            $update->status = "1";
        } elseif ($request->status == '') {
            $update->status = "0";
        }

        $update->save();

        $id = $update->id;

        if ($request->images) {
            foreach ($request->images as $image) {
                $imagesTable = feature_images::find()->where('feature_id', $id)->get();
                $imagesTable->feature_id = $id;
                $imageName = Str::random(24) . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('appFeatures'), $imageName);
                $imagesTable->images = $imageName;
                $imagesTable->save();
            }
        }

        return redirect()->route('admin.appFeatures')->with('success', 'Feature has been edited sccessfully');
    }

    public function update_feature_status($id)
    {
        $update = app_features::find($id);
        if ($update->status == '1') {
            $update->status = '0';
            $update->save();
            return redirect()->back()->with('success', 'Feature has been deactivated successfully');
        } elseif ($update->status == '0') {
            $update->status = '1';
            $update->save();
            return redirect()->back()->with('success', 'Feature has been activated successfully');
        }
    }
    public function delete_feature($id)
    {
        $data = app_features::find($id);
        $images = feature_images::where('feature_id', $id);
        $images->delete();
        $data->delete();
        return redirect()->back()->with('success', 'Feature has been deleted successfully !');
    }

    //end feature cruds


    // banner adds
    public function list_bannerAdds()
    {
        $title = "Banner Adds";
        $banners = banner_adds::paginate(10);
        $data = compact('title', 'banners');
        return view('admin.banner_adds')->with($data);
    }

    public function add_bannerAdds()
    {
        $title = "Add banner";
        $data = compact('title');
        return view('admin.add_banner')->with($data);
    }

    public function add_banner_data(Request $request)
    {

        $request->validate([
            "type" => "required"
        ]);

        $new = new banner_adds;
        if ($request->type == 'image_type') {
            $request->validate([
                "image" => "required"
            ]);
            $image = $request['image'];
            $imageName = Str::random(24) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/bannerAdds/'), $imageName);
            $new->image_type = $imageName;

            $new->link = $request->link;
            $new->type = $request->type;
            $new->status = '1';
            $new->save();
            return redirect()->route('admin.bannerAdds')->with('success', 'Banner add hasbeen added successfully !');
        } else {
            $request->validate([
                "title" => "required",
                "sub_title" => "required",
                "native_image" => "required"
            ]);
            $new->title = $request->title;
            $new->sub_title = $request->sub_title;

            $image = $request['native_image'];
            $imageName = Str::random(24) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/bannerAdds/'), $imageName);
            $new->native_image = $imageName;
            $new->type = $request->type;
            $new->status = '1';
            $new->native_link = $request->native_link;

            $new->save();
            return redirect()->route('admin.bannerAdds')->with('success', 'Banner add hasbeen added successfully !');
        }
    }

    public function banner_details($id)
    {
        $title = "Banner detail";
        $banners = banner_adds::find($id);
        $data = compact('title', 'banners');
        return view('admin.banner_add_detail')->with($data);
    }
    public function edit_baner($id)
    {
        $title = "Edit banner";
        $banners = banner_adds::find($id);
        $data = compact('title', 'banners');
        return view('admin.edit_banner')->with($data);
    }

    public function edit_banerData($id, Request $request)
    {

        $request->validate([
            "type" => "required"
        ]);

        $update = banner_adds::find($id);
        if ($request->type == 'image_type') {
            $request->validate([
                "image" => "required"
            ]);

            $image = $request['image'];
            $imageName = Str::random(24) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/bannerAdds/'), $imageName);
            $update->image_type = $imageName;

            $update->link = $request->link;
            $update->type = $request->type;
            if ($request->status == 'on') {
                $update->status = "1";
            } elseif ($request->status == '') {
                $update->status = "0";
            }
            $update->update();
            return redirect()->route('admin.bannerAdds')->with('success', 'Banner add has been updated successfully !');
        } else {
            $request->validate([
                "title" => "required",
                "sub_title" => "required",
                "native_image" => "required"
            ]);
            $update->title = $request->title;
            $update->sub_title = $request->sub_title;

            $image = $request['native_image'];
            $imageName = Str::random(24) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/bannerAdds/'), $imageName);
            $update->native_image = $imageName;
            $update->type = $request->type;
            if ($request->status == 'on') {
                $update->status = "1";
            } elseif ($request->status == '') {
                $update->status = "0";
            }
            $update->native_link = $request->native_link;

            $update->update();
            return redirect()->route('admin.bannerAdds')->with('success', 'Banner add has been updated successfully !');
        }
    }

    public function update_banner_status($id)
    {
        $update = banner_adds::find($id);
        if ($update->status == '1') {
            $update->status = '0';
            $update->save();
            return redirect()->back()->with('success', 'Banner has been deactivated successfully');
        } elseif ($update->status == '0') {
            $update->status = '1';
            $update->save();
            return redirect()->back()->with('success', 'Banner has been activated successfully');
        }
    }

    public function delete_banerData($id)
    {
        $data = banner_adds::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Banner has been deleted successfully !');
    }

    // end banner adds

    // region start
    public function list_regions()
    {
        $title = "List of regions";
        $regions = regions::paginate(10);
        $data = compact('title', 'regions');
        return view('admin.Regions')->with($data);
    }

    public function add_region()
    {
        $title = "Add region";
        $data = compact('title');
        return view('admin.add_region')->with($data);
    }

    public function add_regionData(Request $request)
    {
        $request->validate([
            "name" => "required|max:30"
        ]);
        $new = new regions;
        $new->name = $request->name;
        $new->status = '1';
        $new->save();
        return redirect()->route('admin.regions')->with('success', 'Region has been added successfully !');
    }


    public function edit_region($id)
    {
        $title = "Edit region";
        $region = regions::find($id);
        $data = compact('title', 'region');
        return view('admin.edit_region')->with($data);
    }

    public function edit_regionData($id, Request $request)
    {
        $request->validate([
            "name" => "required|max:30"
        ]);
        $update = regions::find($id);
        $update->name = $request->name;
        if ($request->status == 'on') {
            $update->status = "1";
        } elseif ($request->status == '') {
            $update->status = "0";
        }
        $update->save();
        return redirect()->route('admin.regions')->with('success', 'Region has been edited successfully !');
    }

    public function update_region_status($id)
    {
        $update = regions::find($id);
        if ($update->status == '1') {
            $update->status = '0';
            $update->save();
            return redirect()->back()->with('success', 'Region has been deactivated successfully');
        } elseif ($update->status == '0') {
            $update->status = '1';
            $update->save();
            return redirect()->back()->with('success', 'Region has been activated successfully');
        }
    }


    public function delete_regionData($id)
    {

        $getCountry = countries::where('region_id', $id)->first();
        if ($getCountry != "") {
            $city = cities::where('country_id', $getCountry->id)->delete();
            $country = countries::where('region_id', $id)->delete();
            $data = regions::find($id)->delete();
        }else{
            $data = regions::find($id)->delete();
        }

        return redirect()->back()->with('success', 'Region has been deleted successfully !');
    }

    // region end

    // country start
    public function list_countries()
    {
        $title = "List of Countries";
        $countries = countries::with('regions')->paginate(10);
        $data = compact('title', 'countries');
        return view('admin.countries')->with($data);
    }

    public function add_countries()
    {
        $title = "Add country";
        $regions = regions::all()->where('status', '1');
        $data = compact('title', 'regions');
        return view('admin.add_country')->with($data);
    }
    public function add_countriesData(Request $request)
    {
        $request->validate([
            "name" => "required",
            "region_id" => "required",
            "capital" => "required",
            "country_code" => "required",
            "flag" => "required",
        ]);

        $new = new countries;
        $new->name = $request->name;
        $new->region_id = $request->region_id;
        $new->capital = $request->capital;
        $new->country_code = $request->country_code;
        $new->status = '1';

        $image = $request['flag'];
        $imageName = Str::random(24) . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('/countryFlags/'), $imageName);
        $new->flag_image = $imageName;

        $new->save();

        return redirect()->route('admin.countries')->with('success', 'Country has been added successfully !');

    }

    public function edit_country($id)
    {
        $title = "Edit country";
        $country = countries::find($id);
        $regions = regions::where('id', $country->region_id)->get();
        $data = compact('title', 'regions', 'country');
        return view('admin.edit_country')->with($data);
    }

    public function edit_countryData($id, Request $request)
    {
        $request->validate([
            "name" => "required",
            "region_id" => "required",
            "capital" => "required",
            "country_code" => "required",
            "flag" => "required",
        ]);

        $update = countries::find($id);
        $update->name = $request->name;
        $update->region_id = $request->region_id;
        $update->capital = $request->capital;
        $update->country_code = $request->country_code;
        if ($request->status == 'on') {
            $update->status = "1";
        } elseif ($request->status == '') {
            $update->status = "0";
        }

        if ($request->flag) {
            $image = $request['flag'];
            $imageName = Str::random(24) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/countryFlags/'), $imageName);
            $update->flag_image = $imageName;
        }

        $update->save();

        return redirect()->route('admin.countries')->with('success', 'Country has been updated successfully !');

    }


    public function update_country_status($id)
    {
        $update = countries::find($id);
        if ($update->status == '1') {
            $update->status = '0';
            $update->save();
            return redirect()->back()->with('success', 'Country has been deactivated successfully');
        } elseif ($update->status == '0') {
            $update->status = '1';
            $update->save();
            return redirect()->back()->with('success', 'Country has been activated successfully');
        }
    }

    public function delete_countryData($id)
    {
        $getCity = cities::where('country_id', $id)->delete();
        $data = countries::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Country has been deleted successfully !');
    }

    // cities start
    public function list_cities()
    {
        $title = "List of Cities";
        $cities = cities::with('countries')->paginate(10);
        $data = compact('title', 'cities');
        return view('admin.cities')->with($data);
    }

    public function add_city()
    {
        $title = "Add city";
        $countries = countries::all()->where('status', '1');
        $data = compact('title', 'countries');
        return view('admin.add_city')->with($data);
    }

    public function add_cityData(Request $request)
    {
        $request->validate([
            "name" => "required",
            "country_id" => "required",
            "country_code" => "required",
        ]);

        $new = new cities;
        $new->name = $request->name;
        $new->country_id = $request->country_id;
        $new->country_code = $request->country_code;
        $new->status = '1';

        if ($request->capital == 'on') {
            $new->is_capital = "1";
        } elseif ($request->capital == '') {
            $new->is_capital = "0";
        }

        $new->save();
        return redirect()->route('admin.cities')->with('success', 'City has been added successfully !');

    }

    public function edit_city($id)
    {
        $title = "Edit city";
        $cities = cities::find($id);
        $countries = countries::where('id', $cities->country_id)->get();
        $data = compact('title', 'cities', 'countries');
        return view('admin.edit_city')->with($data);
    }

    public function edit_CityData($id, Request $request)
    {
        $request->validate([
            "name" => "required",
            "country_id" => "required",
            "country_code" => "required",
        ]);

        $update = cities::find($id);
        $update->name = $request->name;
        $update->country_id = $request->country_id;
        $update->country_code = $request->country_code;

        if ($request->status == 'on') {
            $update->status = "1";
        } elseif ($request->status == '') {
            $update->status = "0";
        }

        if ($request->capital == 'on') {
            $update->is_capital = "1";
        } elseif ($request->capital == '') {
            $update->is_capital = "0";
        }

        $update->save();
        return redirect()->route('admin.cities')->with('success', 'City has been edited successfully !');

    }

    public function update_city_status($id)
    {
        $update = cities::find($id);
        if ($update->status == '1') {
            $update->status = '0';
            $update->save();
            return redirect()->back()->with('success', 'City has been deactivated successfully');
        } elseif ($update->status == '0') {
            $update->status = '1';
            $update->save();
            return redirect()->back()->with('success', 'City has been activated successfully');
        }
    }


    public function delete_cityData($id)
    {
        $data = cities::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'City has been deleted successfully !');
    }

    //end cities


    // playlist start

    public function playlist()
    {
        $title = "Playlist";
        $playlists = playlists::paginate(10);
        $data = compact('title', 'playlists');
        return view('admin.playlist')->with($data);
    }

    public function add_playlist()
    {
        $title = "Add playlist";
        $data = compact('title');
        return view('admin.add_playlist')->with($data);
    }

    public function add_playlistData(Request $request)
    {
        $request->validate([
            "name" => "required",
            "image" => "required",
        ]);

        $new = new playlists;
        $new->name = $request->name;
        $new->description = $request->desc;
        $new->status = '1';

        $image = $request['image'];
        $imageName = Str::random(24) . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('/playlistImages/'), $imageName);
        $new->image = $imageName;

        $new->save();
        return redirect()->route('admin.playlist')->with('success', 'Playlist has been added successfully !');
    }

    public function edit_playlist($id)
    {
        $title = "Edit playlist";
        $playlist = playlists::find($id);
        $data = compact('title', 'playlist');
        return view('admin.edit_playlist')->with($data);
    }

    public function edit_playlistData($id, Request $request)
    {
        $request->validate([
            "name" => "required",
        ]);

        $update = playlists::find($id);
        $update->name = $request->name;
        if ($request->desc) {
            $update->description = $request->desc;
        }

        if ($request->image) {
            $image = $request['image'];
            $imageName = Str::random(24) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/playlistImages/'), $imageName);
            $update->image = $imageName;
        }

        if ($request->status == 'on') {
            $update->status = "1";
        } elseif ($request->status == '') {
            $update->status = "0";
        }

        $update->save();
        return redirect()->route('admin.playlist')->with('success', 'Playlist has been edited successfully !');
    }

    public function delete_playlistData($id)
    {
        $tracks = tracks::where('playlist_id', $id)->delete();
        $data = playlists::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Playlist has been deleted successfully !');
    }

    public function delete_playlistTrackData($id)
    {
        $data = tracks::where('playlist_id', $id);
        $data->delete();
        return redirect()->back()->with('success', 'Tracks has been deleted successfully !');
    }

    public function status_playlistd($id)
    {
        $update = playlists::find($id);
        $update->status = '0';
        $update->save();

        return redirect()->back()->with('success', 'Status has been updated');
    }
    public function status_playlista($id)
    {
        $update = playlists::find($id);
        $update->status = '1';
        $update->save();

        return redirect()->back()->with('success', 'Status has been updated');
    }
    //playlist end

    //track start
    public function tracks()
    {
        $title = "Tracks";
        $tracks = tracks::paginate(10);
        $playlists = playlists::where('status', '1')->paginate(10);
        $data = compact('title', 'tracks', 'playlists');
        return view('admin.tracks')->with($data);
    }

    public function add_tracksData(Request $request)
    {

        $request->validate([
            "name" => "required",
            "playlist" => "required",
            "audio" => "required"
        ]);


        $new = new tracks;
        $new->name = $request->name;
        $new->description = $request->desc;
        $new->playlist_id = $request->playlist;

        if ($request->defaultimg == 'on') {
            $new->image = 'default';
        } else {
            $request->validate([
                "image" => "required"
            ]);
            if ($request->image) {
                $image = $request['image'];
                $imageName = Str::random(24) . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('/trackImages/'), $imageName);
                $new->image = $imageName;
            }
        }

        $new->audio_url = $request->audio;
        $new->status = '1';

        $new->save();
        return redirect()->back()->with('success', 'Track has been added successfully !');

    }


    public function edit_tracksData($id, Request $request)
    {

        $request->validate([
            "name" => "required",
            "playlist" => "required",
            "audio" => "required"
        ]);


        $update = tracks::find($id);
        $update->name = $request->name;
        $update->description = $request->desc;
        $update->playlist_id = $request->playlist;

        if ($request->defaultimg == 'on') {
            $update->image = 'default';
        } else {
            if ($request->image) {
                $image = $request['image'];
                $imageName = Str::random(24) . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('/trackImages/'), $imageName);
                $update->image = $imageName;
            }
        }

        $update->audio_url = $request->audio;
        if ($request->status == 'on') {
            $update->status = "1";
        } elseif ($request->status == '') {
            $update->status = "0";
        }
        $update->save();
        return redirect()->back()->with('success', 'Track has been edited successfully !');

    }

    public function update_track_status($id)
    {
        $update = tracks::find($id);
        if ($update->status == '1') {
            $update->status = '0';
            $update->save();
            return redirect()->back()->with('success', 'Track has been deactivated successfully');
        } elseif ($update->status == '0') {
            $update->status = '1';
            $update->save();
            return redirect()->back()->with('success', 'Track has been activated successfully');
        }
    }

    public function delete_tracksData($id)
    {
        $data = tracks::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Track has been deleted successfully !');
    }
    //end track

    // profile start
    public function profile_page($id)
    {
        $title = "Admin Profile";
        $admin = admins::find($id);
        $data = compact('title', 'admin');
        return view('admin.profile')->with($data);
    }

    public function profile_edit($id, Request $request)
    {

        $update = admins::find($id);

        if ($request->password) {
            $request->validate([
                "password" => ["required", Password::min(8)->letters()],
            ]);

            $update->password = Hash::make($request->password);
        }

        $update->status = '1';

        $update->save();

        return redirect()->back()->with('success', 'Profile has been edited successfully');
    }

    // clear cache
    public function clearCache()
    {
        Artisan::call('cache:clear');
        return redirect()->back()->with('success', 'cache has been cleared');
    }

    public function adjustTracks($id)
    {
        $title = "Adjust tracks";
        $tracks = tracks::where('playlist_id', $id)->get();
        $data = compact('title', 'tracks');
        return view('admin.adjustTracks')->with($data);
    }

    public function checkingTracks(Request $request)
    {

        $del = Testing::where('value', 1)->delete();

        foreach ($request['position'] as $pos) {
            $new = new Testing;

            $new->value = 1;
            $new->name = $pos;

            $new->save();
        }

        $view = Testing::all();
        return $view;
        // return redirect()->back();
    }

    public function rearrangeTracks(Request $request)
    {

        $del = tracks::where('playlist_id', $request->playlist_id)->delete();

        foreach ($request['name'] as $key => $name) {

            $new = new tracks;

            $new->name = $name;
            $new->description = $request['description'][$key];
            $new->image = $request['image'][$key];
            $new->status = $request['status'][$key];
            $new->playlist_id = $request['playlist_id'];
            $new->audio_url = $request['audio_url'][$key];

            $new->save();
        }

        return redirect()->back()->with('success', 'Tracks are re-arranged successfully !');
    }
}
