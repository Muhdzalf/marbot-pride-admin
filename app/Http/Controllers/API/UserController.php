<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Rules\Password;

class UserController extends Controller
{
    public function register(Request $request)
    {
        try {
            $request->validate([
                'name' => ['required', 'string', 'max:50'],
                'email' => ['required', 'string', 'email', 'unique:users', 'max:50'],
                'phone_number' => ['required', 'string', 'max:13'],
                'birth_date' => ['required', 'date', 'max:10'],
                'password' => ['required', 'string', new Password]
            ]);

            User::create(
                [
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone_number' => $request->phone_number,
                    'birth_date' => $request->birth_date,
                    'password' => Hash::make($request->password),
                ]
            );

            // menggambil data pertama yang sesuai dengan kriteria
            $user = User::where('email', $request->email)->first();

            $tokenResult = $user->createToken('authToken')->plainTextToken;

            return ResponseFormatter::success(
                [
                    'acces_token' => $tokenResult,
                    'token_type' => 'Bearer',
                    'user' => $user,

                ],
                'Pendaftaran User Berhasil'
            );
        } catch (Exception $error) {
            return ResponseFormatter::error(
                [
                    'message' => 'Something went Wrong',
                    'error' => $error,
                    'user' => null,
                ],
                'Pendaftaran User Gagal',
                404
            );
        }
    }

    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required']
            ]);

            $credential = request(['email', 'password']);
            if (!Auth::attempt($credential)) {
                return ResponseFormatter::error(
                    [
                        'message' => 'Unauthorized'
                    ],
                    'Authentication Failed',
                    500
                );
            }
            $user = User::where('email', $request->email,)->first();

            if (!Hash::check($request->password, $user->password, [])) {
                throw new \Exception('Invalid Credentials');
            }

            $tokenResult = $user->createToken('authToken')->plainTextToken;

            return ResponseFormatter::success(
                [
                    'acces_token' => $tokenResult,
                    'token_type' => 'Bearer',
                    'user' => $user
                ],
                'Authenticated'
            );
        } catch (Exception $error) {
            return ResponseFormatter::error(
                [
                    'message' => 'Something Went Wrong',
                    'error' => $error
                ],
                'Authentication Failed',
                500
            );
        }
    }

    public function fetch(Request $request)
    {
        return ResponseFormatter::success(
            $request->user(),
            'Data User Berhasil diambil'
        );
    }

    public function updateProfile(Request $request, User $user)
    {
        $data = $request->all();
        $user = Auth::user();
        $user->update($data);

        return ResponseFormatter::success(
            $user,
            'Data Berhasil diupdate'
        );
    }

    public function logout(Request $request)
    {
        $token = $request->user()->currentAccessToken()->delete();

        return ResponseFormatter::success(
            $token,
            'Token Revoked'
        );
    }
}
