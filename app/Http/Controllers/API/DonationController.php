<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Models\Kajian;
use App\Models\Program;
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
        $method = $request->input('show_method');
        $item = $request->input('show_item');
        $limit = $request->input('limit');


        if ($id) {
            $donation = Donation::with(['method', 'itemable'])->where('user_id', Auth::user()->id)->find($id);
            if ($donation) {
                return ResponseFormatter::success(
                    $donation,
                    'Data Donasi berhasil ditemukan'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'Data Donasi tidak ditemukan',
                    404
                );
            }
        }

        $donation = Donation::where('user_id', Auth::user()->id);

        if ($status) {
            $donation->where('status', 'like', '%' . $status . '%');
        }

        if ($donation_from) {
            $donation->where('total_donation', '>=', $donation_from);
        }

        if ($donation_to) {
            $donation->where('total_donation', '<=', $donation_to);
        }

        if ($item) {
            $donation->with('itemable');
        }
        if ($method) {
            $donation->with('method');
        }

        return ResponseFormatter::success(
            $donation->paginate($limit),
            'List Data Donasi berhasil diambil'
        );
    }

    public function checkout(Request $request)
    {
        // $kajianId = $request->input('kajian_id');
        $request->validate(
            [
                'kajian_id' => 'integer',
                'program_id' => 'integer',
                'method_id' => 'required|integer',
                'nominal' => 'required|integer',
                'status' => 'in:pending,canceled,success,failed',

            ]
        );

        $kajianId = $request->kajian_id;
        $programId = $request->program_id;

        $donation = [
            'user_id' => Auth::user()->id,
            'method_id' => $request->method_id,
            'nominal' => $request->nominal,
            'status' => 'pending'
        ];

        if ($kajianId) {
            $kajian = Kajian::find($kajianId);

            if (!$kajian) {
                return ResponseFormatter::error(
                    null,
                    'Data Kajian Tidak Ditemukan',
                    404
                );
            }

            $donation = $kajian->donations()->create($donation);
        }
        if ($programId) {
            $program = Program::find($programId);
            if (!$program) {
                return ResponseFormatter::error(
                    null,
                    'Data Kajian Tidak Ditemukan',
                    404
                );
            }
            $donation = $program->donations()->create($donation);
        }

        return ResponseFormatter::success(
            // $donation,
            $donation,
            'Donasi Anda Telah dikirimkan. Silahkan Hubungi admin untuk proses verifikasi'
        );
    }
}
