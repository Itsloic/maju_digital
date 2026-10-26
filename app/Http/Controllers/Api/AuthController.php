<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Level;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['E-mail atau password salah.'],
            ]);
        }

        $abilities = $this->getAbilitiesForLevel($user->level_id);

        $token = $user->createToken('api-token', $abilities, now()->addMinutes(60))->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => 3600,
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'level' => $user->level?->nama_level,
                'role' => $user->role,
            ],
        ]);
    }

    public function logout(Request $request): JsonResponse
    {
        $request->user()->tokens()->delete();
        Auth::forgetGuards();

        return response()->json([
            'message' => 'Berhasil logout.',
        ]);
    }

    private function getAbilitiesForLevel(int $levelId): array
    {
        return match ($levelId) {
            Level::ADMINISTRATOR => ['admin', 'editor', 'penulis', 'masyarakat'],
            Level::EDITOR => ['editor', 'penulis', 'masyarakat'],
            Level::PENULIS => ['penulis', 'masyarakat'],
            default => ['masyarakat'],
        };
    }
}
