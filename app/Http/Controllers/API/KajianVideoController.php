<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\KajianVideo;
use Illuminate\Http\Request;

class KajianVideoController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $title = $request->input('title');
        $tag = $request->input('tag');
        $limit = $request->input('limit');
        $show_kajian = $request->input('show_kajian');
        $categories = $request->input('categories');
        $show_donation = $request->input('show_donation');

        if ($id) {
            $video = KajianVideo::with(['donations',])->find($id);
            if ($video) {
                return ResponseFormatter::success(
                    $video,
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

        $video = KajianVideo::with(['categories',]);

        if ($title) {
            $video->where('title', 'like', '%' . $title . '%');
        }

        if ($tag) {
            $video->where('tag', 'like', '%' . $tag . '%');
        }

        if ($show_kajian) {
            $video->with('kajian');
        }

        if ($categories) {
            $video->where('video', $categories);
        }
        if ($show_donation) {
            $video->with('donations');
        }

        return ResponseFormatter::success(
            $video->paginate($limit),
            'Data List Video Berhasil diambil'
        );
    }
}
