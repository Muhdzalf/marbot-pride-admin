<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;

class DonasiController extends Controller
{
    public function index()
    {
        return view('pages.donation.donation-data', [
            'donation' => Donation::class
        ]);
    }
}
