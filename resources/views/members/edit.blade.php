@extends('layouts.app')

@section('title', 'Edit Anggota')

@section('content')
    <h1>Edit Anggota</h1>

    <p><a href="{{ route('members.index') }}">&larr; Kembali</a></p>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('members.update', $member->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="nama">Nama Anggota:</label><br>
            <input type="text" id="nama" name="nama" value="{{ old('nama', $member->nama) }}" required>
        </div>
        <br>
        <div>
            <label for="nim">NIM:</label><br>
            <input type="text" id="nim" name="nim" value="{{ old('nim', $member->nim) }}" required>
        </div>
        <br>
        <div>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" value="{{ old('email', $member->email) }}" required>
        </div>
        <br>
        <div>
            <label for="nomor_telepon">Nomor Telepon:</label><br>
            <input type="text" id="nomor_telepon" name="nomor_telepon" value="{{ old('nomor_telepon', $member->nomor_telepon) }}" required>
        </div>
        <br>
        <div>
            <label for="alamat">Alamat:</label><br>
            <textarea id="alamat" name="alamat" required>{{ old('alamat', $member->alamat) }}</textarea>
        </div>
        <br>
        <div>
            <label for="status">Status:</label><br>
            <select id="status" name="status" required>
                <option value="aktif" {{ old('status', $member->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="nonaktif" {{ old('status', $member->status) == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
            </select>
        </div>
        <br>
        <button type="submit">Update Anggota</button>
    </form>
@endsection