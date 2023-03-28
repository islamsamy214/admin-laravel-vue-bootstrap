<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateSettingRequest;

class SettingController extends Controller
{

    public function retreve()
    {
        return Setting::first();
    } //end of retreve


    public function update(UpdateSettingRequest $request)
    {
        Setting::first()->update($request->all());
    } // end of update

}
