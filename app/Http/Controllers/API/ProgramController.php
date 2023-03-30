<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $status = $request->input('status');
        $description = $request->input('description');
        $limit = $request->input(6);
        $show_donation = $request->input('show_donation');

        if ($id) {
            $program = Program::with(['donations'])->find($id);
            if ($program) {
                return ResponseFormatter::success(
                    $program,
                    'Data Program berhasil diambil'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'Data Program Tidak ditemukan',
                    404
                );
            }
        }

        $program = Program::query();

        if ($name) {
            $program->where('name', 'like', '%' . $name . '%');
        }

        if ($description) {
            $program->where('description', 'like', '%' . $description . '%');
        }
        if ($status) {
            $program->where('status', 'like', '%' . $status . '%');
        }

        if ($show_donation) {
            $program->with('donations');
        }

        if ($program->count() > 0) {
            return ResponseFormatter::success(
                $program->paginate($limit),
                'Data List Video Berhasil diambil'
            );
        } else {
            return ResponseFormatter::error(
                null,
                'Data Program Tidak ditemukan',
                404
            );
        };
    }
}
