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
                                <li class="breadcrumb-item"><a href="#">Pembayaran</a></li>
                                <li class="breadcrumb-item" aria-current="page">Pembayaran Berhasil</li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="page-header-title">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->

            <!-- [ Main Content ] start -->
            <div class="row">
                <!-- [ basic-table ] start -->
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body table-border-style">
                            <div class="table-responsive">

                                @if(session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif

                                <div class="container">
                                    <h2 class="mt-4">Pembayaran Anda Telah Berhasil.</h2>
                                    <p class="mt-3">Terima kasih telah menyelesaikan proses pembayaran. Kami sangat
                                        menghargai partisipasi Anda dalam program kursus ini.</p>

                                    <p>Untuk mendapatkan informasi lebih lanjut mengenai jadwal pelaksanaan, materi
                                        pembelajaran, serta diskusi bersama peserta lainnya, silakan bergabung ke grup
                                        Telegram resmi kami.</p>

                                    <p class="fw-bold">Dengan bergabung, Anda akan :</p>
                                    <ul>
                                        <li>Mendapatkan notifikasi seputar materi dan jadwal kursus</li>
                                        <li>Bisa bertanya langsung kepada pengajar atau admin</li>
                                        <li>Berinteraksi dengan peserta lainnya dalam satu komunitas</li>
                                    </ul>

                                    <a href="{{ $telegramLink }}" target="_blank" class="btn btn-primary mt-3">
                                        Bergabung ke Grup Telegram
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- [ basic-table ] end -->
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </section>

@endsection