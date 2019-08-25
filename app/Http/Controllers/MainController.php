<?php

namespace App\Http\Controllers;

use App\Models\Record;

class MainController extends Controller
{
    public function template() {
        $list = Record::all()->sortByDesc('id');
        return view('main.main', ['list' => $list]);
    }

    public function errorPage() {
        return view('errors.message');
    }
}
