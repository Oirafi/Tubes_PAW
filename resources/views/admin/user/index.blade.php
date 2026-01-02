@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endpush

@section('content')
<div class="admin-container">

    <h1>👥 Manajemen Pengguna</h1>

    @if(session('success'))
        <div class="alert success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert danger">{{ session('error') }}</div>
    @endif

    <table class="admin-table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>

                    <td>
                        {{-- FORM GANTI ROLE --}}
                        <form action="{{ route('admin.users.updateRole', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <select name="role" onchange="this.form.submit()">
                                <option value="user" {{ $user->role == 'user' ? 'selected':'' }}>User</option>
                                <option value="admin" {{ $user->role == 'admin' ? 'selected':'' }}>Admin</option>
                            </select>
                        </form>
                    </td>

                    <td class="aksi">
                        @if(auth()->id() != $user->id)
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn-small danger" onclick="return confirm('Hapus user ini?')">
                            Hapus
                        </button>
                    </form>

                        @else
                            <span class="badge">Sedang Login</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
