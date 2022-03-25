<?php

namespace App\Http\Controllers;

use App\Models\DonationMethod;
use Illuminate\Http\Request;

class DonationMethodController extends Controller
{
    public function index()
    {
        return view('pages.method.method-data', [
            'method' => DonationMethod::class
        ]);
    }
}
