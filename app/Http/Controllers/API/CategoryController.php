<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('id');
        $limit = $request->input('limit');
        $show_videos = $request->input('show_videos');

        if ($id) {
            $category = Category::with(['kajians', 'videos'])->find($id);

            if ($category) {
                return ResponseFormatter::success(
                    $category,
                    'data berhasil diambil'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'Data gagal diambil',
                    404
                );
            }
        }

        $category = Category::query();

        if ($name) {
            $category->where('name', 'like', '%' . $name . '%');
        }

        if ($show_videos) {
            $category->with('videos');
        }

        return ResponseFormatter::success(
            $category->paginate($limit),
            'Data Kategori berhasil Diambil'
        );
    }
}
