<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Models\DonationMethod;
use Illuminate\Http\Request;

class DonationMethodController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('nama');
        $limit = $request->input('limit');
        // $show_donation = $request->input('show_donation');

        if ($id) {
            $method = DonationMethod::find($id);

            if ($method) {
                return ResponseFormatter::success(
                    $method,
                    'Data Metode Donasi berhasil diambil',
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'Data Metode tidak ditemukan',
                    404
                );
            }
        }

        $method = DonationMethod::query();

        if ($name) {
            $method->where('name', 'like', '%' . $name . '%');
        }

        // if ($show_donation) {
        //     $method->with('donations');
        // }

        if ($method->count() > 0) {
            return ResponseFormatter::success(
                $method->paginate($limit),
                'Data Metode berhasil diambil'
            );
        } else {
            return ResponseFormatter::error(
                null,
                'Data Metode tidak ditemukan',
                404
            );
        }
    }
}
