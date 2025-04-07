@extends('partial.template')

@section('content')
<<<<<<< Updated upstream

    {{-- <div class="pc-container">
        <div class="pc-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10">Home</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                            </ul>
=======
<div class="pc-container">
    <div class="pc-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Home</h5>
>>>>>>> Stashed changes
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
<<<<<<< Updated upstream
    </div> --}}
=======
>>>>>>> Stashed changes

        <!-- Kursus Cards -->
        <div class="row">
            @foreach($kursusList as $kursus)
            <div class="col-md-6 col-xl-3 mb-4">
                <div class="card h-100 shadow-sm border border-primary">
                    <img src="{{ $kursus['image'] }}" class="card-img-top" alt="Thumbnail" style="height: 160px; object-fit: cover;">
                    <div class="card-body d-flex flex-column">
                        <h6 class="card-title text-truncate">{{ $kursus['judul'] }}</h6>
                        <p class="text-muted mb-1" style="font-size: 14px;">{{ $kursus['pengajar'] }}</p>
                        <div class="mb-1">
                            <span class="text-warning">
                                ★ {{ number_format($kursus['rating'], 1) }}
                            </span>
                            <small class="text-muted">({{ $kursus['ulasan'] }})</small>
                        </div>
                        <div>
                            <strong class="text-danger">Rp{{ number_format($kursus['harga_diskon'], 0, ',', '.') }}</strong>
                            <small class="text-muted text-decoration-line-through">
                                Rp{{ number_format($kursus['harga_asli'], 0, ',', '.') }}
                            </small>
                            @if($kursus['status'] === 'Terlaris')
                                <span class="badge bg-success">Terlaris</span>
                            @endif
                        </div>

                        <!-- Tombol di bawah harga tanpa hover -->
                        <div class="mt-3 d-flex justify-content-between">
                            <a href="#" class="btn btn-sm border border-primary text-primary w-100 me-1" style="font-weight: 500; background-color: transparent;">
                                Keranjang
                            </a>
                            <a href="#" class="btn btn-sm border border-success text-success w-100 ms-1" style="font-weight: 500; background-color: transparent;">
                                Tambah
                            </a>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
