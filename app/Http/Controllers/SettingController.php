<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Setting::all();
        return view('dash.setting.all', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dash.setting.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $locales = LaravelLocalization::getSupportedLocales();
        ;
        $rules = [
            'logo' => 'required|image',
            'favicon' => 'required|image',
            'facebook' => 'required|string',
            'linkedin' => 'required|string',
            'email' => 'required|string',
            'phone' => 'required|string',
        ];

        foreach($locales  as $localeCode => $properties) {
            $rules["{$localeCode}.title"] = 'required|string';
            $rules["{$localeCode}.content"] = 'required|string';
        }

        $request->validate($rules);

        $allSettingsWithoutImages = $request->except(['logo','favicon']);
        Setting::create($allSettingsWithoutImages);

    }

    /**
     * Display the specified resource.
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Setting $setting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
