<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonationController extends Controller
{

    // mengambil semua data donasi 
    public function all(Request $request)
    {
        $id = $request->input('id');
        $status = $request->input('status');
        $donation_from = $request->input('donation_from');
        $donation_to = $request->input('donation_to');
        $limit = $request->input('limit');

        if ($id) {
            $donation = Donation::with(['method', 'video', 'program'])->find($id);
            if ($donation) {
                ResponseFormatter::success(
                    $donation,
                    'Data Donasi berhasil diambil'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'Data Donasi Tidak Ditemukan',
                    404
                );
            }
        }

        $donation = Donation::with(['method', 'video', 'programs'])->where('user_id', Auth::user()->id);

        if ($status) {
            $donation->where('status', 'like', '%' . $status . '%');
        }

        if ($donation_from) {
            $donation->where('total_donation', '>=', $donation_from);
        }
        if ($donation_to) {
            $donation->where('total_donation', '<=', $donation_to);
        }

        return ResponseFormatter::success(
            $donation->paginate($limit),
            'List Data Donasi berhasil diambil'
        );
    }

    public function checkout(Request $request)
    {

        $request->validate(
            [
                'video_id' => 'integer',
                'program_id' => 'integer',
                'method_id' => 'required|integer',
                'donation' => 'required',
                'status' => 'required|in:pending,canceled,success,failed',

            ]
        );

        $donation = Donation::create([
            'user_id' => Auth::user()->id,
            'video_id' => $request->video_id,
            'program_id' => $request->program_id,
            'method_id' => $request->method_id,
            'donation' => $request->donation,
            'status' => $request->status

        ]);

        return ResponseFormatter::success(
            $donation,
            'Donasi Berhasil'
        );
    }
}
