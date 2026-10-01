<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of all users (Super Admin only).
     */
    public function index(Request $request)
    {
        $query = User::query();

        // Pencarian nama atau email
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        // Filter berdasarkan role
        if ($request->filled('role') && in_array($request->role, ['admin', 'super_admin'])) {
            $query->where('role', $request->role);
        }

        // Filter berdasarkan status
        if ($request->filled('status') && in_array($request->status, ['aktif', 'nonaktif'])) {
            $query->where('status', $request->status);
        }

        $users = $query->latest()->get();

        // Statistik cepat
        $totalUsers = User::count();
        $totalSuperAdmin = User::where('role', 'super_admin')->count();
        $totalAdmin = User::where('role', 'admin')->count();
        $totalAktif = User::where('status', 'aktif')->count();

        return view('admin.pages.users.index', compact(
            'users',
            'totalUsers',
            'totalSuperAdmin',
            'totalAdmin',
            'totalAktif'
        ));
    }

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        return view('admin.pages.users.create');
    }

    /**
     * Store a newly created user in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'role' => 'required|in:admin,super_admin',
            'status' => 'required|in:aktif,nonaktif',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'name.required' => 'Nama lengkap wajib diisi.',
            'email.required' => 'Alamat email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Alamat email ini sudah terdaftar oleh pengguna lain.',
            'role.required' => 'Pilih hak akses (role) akun.',
            'password.required' => 'Kata sandi wajib diisi.',
            'password.min' => 'Kata sandi minimal terdiri dari 8 karakter.',
            'password.confirmed' => 'Konfirmasi kata sandi tidak cocok.',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'status' => $request->status,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.index')->with('success', "Akun baru untuk {$user->name} ({$user->role_label}) berhasil dibuat!");
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.pages.users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $rules = [
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
            'role' => 'required|in:admin,super_admin',
            'status' => 'required|in:aktif,nonaktif',
        ];

        // Jika password diisi, validasi konfirmasinya
        if ($request->filled('password')) {
            $rules['password'] = 'string|min:8|confirmed';
        }

        $request->validate($rules, [
            'name.required' => 'Nama lengkap wajib diisi.',
            'email.required' => 'Alamat email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Alamat email ini sudah digunakan akun lain.',
            'password.min' => 'Kata sandi baru minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi kata sandi baru tidak cocok.',
        ]);

        // Pencegahan: Super Admin yang sedang login tidak boleh menonaktifkan atau menurunkan role akunnya sendiri
        if ($user->id === Auth::id()) {
            if ($request->role !== 'super_admin') {
                return back()->withInput()->with('error', 'Anda tidak dapat menurunkan hak akses akun Anda sendiri dari Super Administrator.');
            }
            if ($request->status !== 'aktif') {
                return back()->withInput()->with('error', 'Anda tidak dapat menonaktifkan akun Anda sendiri saat sedang login.');
            }
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->status = $request->status;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('users.index')->with('success', "Data akun {$user->name} berhasil diperbarui.");
    }

    /**
     * Toggle active/inactive status for a user.
     */
    public function toggleStatus(string $id)
    {
        $user = User::findOrFail($id);

        // Jangan izinkan menonaktifkan diri sendiri
        if ($user->id === Auth::id()) {
            return back()->with('error', 'Anda tidak dapat mengubah status akun Anda sendiri.');
        }

        $user->status = ($user->status === 'aktif') ? 'nonaktif' : 'aktif';
        $user->save();

        $pesan = $user->status === 'aktif' ? 'berhasil diaktifkan' : 'berhasil dinonaktifkan';
        return redirect()->route('users.index')->with('success', "Akun {$user->name} {$pesan}.");
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        // Jangan izinkan menghapus diri sendiri
        if ($user->id === Auth::id()) {
            return back()->with('error', 'Anda tidak dapat menghapus akun Anda sendiri saat sedang login!');
        }

        // Cegah menghapus jika ini adalah satu-satunya super admin
        if ($user->isSuperAdmin() && User::where('role', 'super_admin')->count() <= 1) {
            return back()->with('error', 'Tidak dapat menghapus Super Administrator satu-satunya di sistem.');
        }

        $nama = $user->name;
        $user->delete();

        return redirect()->route('users.index')->with('success', "Akun {$nama} berhasil dihapus dari sistem.");
    }
}
