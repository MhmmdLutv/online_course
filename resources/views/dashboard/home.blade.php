@extends('partial.template')

@section('content')

    <div class="pc-container">
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
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="row">
                <!-- [ sample-page ] start -->
                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="mb-2 f-w-400 text-muted">Total Pengguna</h6>
                            <h4 class="mb-3">{{ number_format($totalPengguna) }}<span class="badge bg-light-primary border border-primary"></span></h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="mb-2 f-w-400 text-muted">Total Kursus</h6>
                            <h4 class="mb-3">{{ number_format($totalKursus) }} <span class="badge bg-light-success border border-success"></span></h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="mb-2 f-w-400 text-muted">Total Materi</h6>
                            <h4 class="mb-3">{{ number_format($totalMateri) }} <span class="badge bg-light-warning border border-warning"></span></h4> 
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="mb-2 f-w-400 text-muted">Total Pembayaran</h6>
                            <h4 class="mb-3">{{ number_format($totalPembayaran) }} <span class="badge bg-light-danger border border-danger"></span></h4> 
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection