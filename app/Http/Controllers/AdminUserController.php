<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AdminUserController extends Controller
{
    public function index(): View
    {
        Gate::authorize('kelola-user');
        $users = User::with('level')->latest()->paginate(15);

        return view('admin.users.index', compact('users'));
    }

    public function create(): View
    {
        Gate::authorize('kelola-user');
        $levels = Level::orderBy('id_level')->get();

        return view('admin.users.create', compact('levels'));
    }

    public function store(Request $request): RedirectResponse
    {
        Gate::authorize('kelola-user');

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:12|confirmed',
            'level_id' => 'required|exists:levels,id_level',
        ]);

        $level = Level::find($validated['level_id']);
        $roleMap = [
            Level::ADMINISTRATOR => 'administrator',
            Level::EDITOR => 'editor',
            Level::PENULIS => 'penulis',
            Level::MASYARAKAT => 'masyarakat',
        ];

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'level_id' => $validated['level_id'],
            'role' => $roleMap[$validated['level_id']] ?? 'masyarakat',
            'email_verified_at' => now(),
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Pengguna berhasil dibuat.');
    }

    public function edit(User $user): View
    {
        Gate::authorize('kelola-user');
        $levels = Level::orderBy('id_level')->get();

        return view('admin.users.edit', compact('user', 'levels'));
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        Gate::authorize('kelola-user');

        if ($user->id === auth()->id()) {
            return back()->with('error', 'Tidak dapat mengubah akun sendiri.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$user->id,
            'level_id' => 'required|exists:levels,id_level',
        ]);

        $level = Level::find($validated['level_id']);
        $roleMap = [
            Level::ADMINISTRATOR => 'administrator',
            Level::EDITOR => 'editor',
            Level::PENULIS => 'penulis',
            Level::MASYARAKAT => 'masyarakat',
        ];

        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'level_id' => $validated['level_id'],
            'role' => $roleMap[$validated['level_id']] ?? 'masyarakat',
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Pengguna berhasil diperbarui.');
    }

    public function destroy(User $user): RedirectResponse
    {
        Gate::authorize('kelola-user');

        if ($user->id === auth()->id()) {
            return back()->with('error', 'Tidak dapat menghapus akun sendiri.');
        }

        try {
            $user->delete();

            return redirect()->route('admin.users.index')->with('success', 'Pengguna berhasil dihapus.');
        } catch (QueryException $e) {
            if ($e->getCode() === '23000') {
                return back()->with('error', 'User masih memiliki artikel dan tidak dapat dihapus.');
            }
            throw $e;
        }
    }
}
