<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMemberRequest;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    private array $members = [
        ['id' => 1, 'nama' => 'Ahmad Fauzi', 'nim' => '220101001', 'email' => 'ahmad@example.com', 'nomor_telepon' => '081234567890', 'alamat' => 'Jl. Mawar No. 12', 'status' => 'aktif'],
        ['id' => 2, 'nama' => 'Siti Nurhaliza', 'nim' => '220101002', 'email' => 'siti@example.com', 'nomor_telepon' => '089876543210', 'alamat' => 'Jl. Melati No. 5', 'status' => 'aktif'],
        ['id' => 3, 'nama' => 'Budi Santoso', 'nim' => '220101003', 'email' => 'budi@example.com', 'nomor_telepon' => '085512344321', 'alamat' => 'Jl. Anggrek No. 8', 'status' => 'nonaktif'],
    ];

    public function index()
    {
        $members = $this->members;

        return view('members.index', compact('members'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(StoreMemberRequest $request)
    {
        $validated = $request->validated();

        return redirect()->route('members.index')
            ->with('success', "Anggota \"{$validated['nama']}\" berhasil ditambahkan (data dummy, belum tersimpan ke database).");
    }

    public function show(string $id)
    {
        $member = collect($this->members)->firstWhere('id', (int) $id);

        abort_if(! $member, 404);

        return view('members.show', compact('member'));
    }

    public function edit(string $id)
    {
        return "MemberController@edit, id: {$id}";
    }

    public function update(Request $request, string $id)
    {
        return "MemberController@update, id: {$id}";
    }

    public function destroy(string $id)
    {
        return "MemberController@destroy, id: {$id}";
    }
}