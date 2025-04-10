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
                                <li class="breadcrumb-item"><a href="#">Kursus</a></li>
                                <li class="breadcrumb-item" aria-current="page">Daftar</li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h2 class="mb-0">Daftar Kursus</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->

            <!-- [ Main Content ] start -->
            <div class="row">
                @foreach($kursusPengguna as $k)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 d-flex flex-column">
                            <img src="{{ asset($k->poto ?? 'default.jpg') }}" class="card-img-top" alt="Foto Kursus">
                            <div class="card-body">
                                <h5 class="card-title">{{ $k->nama }}</h5>
                                <p class="card-text">{{ $k->deskripsi ?? '-' }}</p>
                                <p class="card-text"><strong>Rp{{ number_format($k->harga, 2) }}</strong></p>
                                <a href="{{ route('materiPengguna.index', $k->materiid) }}" class="btn btn-primary btn-sm">Detail</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection