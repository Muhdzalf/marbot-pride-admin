<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Kajian;
use Illuminate\Http\Request;

class KajianVideoController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $title = $request->input('title');
        $tag = $request->input('tag');
        $limit = $request->input('limit');
        $show_tema = $request->input('show_tema');
        $categories = $request->input('categories');
        $show_donation = $request->input('show_donation');

        $show_tema = $request->input('show_tema');
        $show_ustadz = $request->input('show_ustadz');

        if ($id) {
            $kajian = Kajian::with(['tema', 'ustadz'])->find($id);
            if ($kajian) {
                return ResponseFormatter::success(
                    $kajian,
                    'Data Video berhasil diambil'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'Data Video Tidak ditemukan',
                    404
                );
            }
        }

        $kajian = Kajian::with(['categories',]);

        if ($title) {
            $kajian->where('title', 'like', '%' . $title . '%');
        }

        if ($tag) {
            $kajian->where('tag', 'like', '%' . $tag . '%');
        }

        if ($show_tema) {
            $kajian->with('tema');
        }

        if ($categories) {
            $kajian->where('video', $categories);
        }

        if ($show_donation) {
            $kajian->with('donations');
        }

        if ($kajian->count() > 0) {
            return ResponseFormatter::success(
                $kajian->paginate($limit),
                'Data List Kajian Berhasil diambil'
            );
        } else {
            return ResponseFormatter::error(
                null,
                'Data Kajian tidak ditemukan',
                404
            );
        }
    }
}
