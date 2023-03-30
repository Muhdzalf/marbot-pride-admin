<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\KajianTheme;
use App\Models\Tema;
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
            $tema = Tema::with(['kajians'])->find($id);
            if ($tema) {
                return ResponseFormatter::success(
                    $tema,
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

        $tema = Tema::query();

        if ($title) {
            $tema->where('title', 'like', '%' . $title . '%');
        }

        if ($tag) {
            $tema->where('name', 'like', '%' . $tag . '%');
        }

        if ($show_videos) {
            $tema->with('kajians');
        }

        if ($tema->count() > 0) {
            return ResponseFormatter::success(
                $tema->paginate($limit),
                'Data Tema Berhasil diambil',
            );
        } else {
            return ResponseFormatter::error(
                null,
                'Data Tema Tidak ditemukan',
                404
            );
        };
    }
}
