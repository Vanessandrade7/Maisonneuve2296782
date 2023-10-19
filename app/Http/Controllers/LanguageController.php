<?php

namespace App\Http\Controllers;


class LanguageController extends Controller
{
    public function switch ($lang)
    {
        if (array_key_exists($lang, config('app.locales'))) {
            session()->put('locale', $lang);
        }
        return redirect()->back();
    }
}
