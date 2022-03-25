<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\KajianTheme;
use Illuminate\Http\Request;

class KajianThemeController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $title = $request->input('title');
        $tag = $request->input('tag');
        $limit = $request->input('limit');
        $show_videos = $request->input('show_videos');

        if ($id) {
            $kajian = KajianTheme::with(['videos', 'admin',])->find($id);
            if ($kajian) {
                return ResponseFormatter::success(
                    $kajian,
                    'Data Kajian berhasil ditemukan'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'Data Kajian tidak ditemukan',
                    404
                );
            }
        }

        $kajian = KajianTheme::query()->with('admin');

        if ($title) {
            $kajian->where('title', 'like', '%' . $title . '%');
        }

        if ($tag) {
            $kajian->where('name', 'like', '%' . $tag . '%');
        }

        if ($show_videos) {
            $kajian->with('videos');
        }

        return ResponseFormatter::success(
            $kajian->paginate($limit),
            'Data Kajian Berhasil diambil',
        );
    }
}
