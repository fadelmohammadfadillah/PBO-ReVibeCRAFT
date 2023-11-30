<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class ratingcontroller extends Controller
{
    public function index(){
        return view('page.admin.tutorial.ratingTutorial');
    }
}
