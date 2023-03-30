<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Ustadz;
use Illuminate\Http\Request;

class UstadzController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $limit = $request->input('6');
        $show_video = $request->input('show_video');

        if ($id) {
            $ustadz = Ustadz::with(['kajians',])->find($id);
            if ($ustadz) {
                return ResponseFormatter::success(
                    $ustadz,
                    'Data Ustadz berhasil ditemukan'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'Data Ustadz tidak ditemukan',
                    404
                );
            }
        }

        $ustadz = Ustadz::query();

        if ($name) {
            $name->where('name', 'like', '%' . $name . '%');
        }

        if ($show_video) {
            $ustadz->with('kajians');
        }

        if ($ustadz->count() > 0) {
            return ResponseFormatter::success(
                $ustadz->paginate($limit),
                'Data Ustadz berhasil diambil'
            );
        } else {

            return ResponseFormatter::error(
                null,
                'Data Ustadz tidak ditemukan',
                404
            );
        }
    }
}
