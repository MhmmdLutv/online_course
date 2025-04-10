@extends('partial.template')

@section('content')

    <section class="pc-container">
        <div class="pc-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Halaman</a></li>
                                <li class="breadcrumb-item"><a href="#">Tabel</a></li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h2 class="mb-0">Edit Pengguna</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->

            <!-- [ Main Content ] start -->
            <form action="{{ route('users.update', $users->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name', $users->name) }}" required>
                </div>

                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email', $users->email) }}"
                        required>
                </div>

                <div class="mb-3">
                    <label for="password">Password (biarkan kosong jika tidak ingin mengubah)</label>
                    <input type="password" class="form-control" name="password">
                </div>

                <div class="mb-3">
                    <label for="role">Role</label>
                    <select class="form-control" name="role">
                        <option value="users" {{ $users->role == 'users' ? 'selected' : '' }}>User</option>
                        <option value="admin" {{ $users->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
            <!-- [ Main Content ] end -->
        </div>
    </section>

@endsection