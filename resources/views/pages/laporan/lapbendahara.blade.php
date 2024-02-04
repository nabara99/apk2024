@extends('layouts.app')

@section('title', '')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Laporan Realisasi</h4>
                            </div>
                            <div class="card-body">
                                <div class="clearfix mb-3"></div>
                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <thead>
                                            <tr>
                                                <th rowspan="2">Sub Kegiatan</th>
                                                <th rowspan="2">Kode Rekening</th>
                                                <th rowspan="2">Nama Rekening</th>
                                                <th colspan="12">Total per Bulan</th>
                                            </tr>
                                            <tr>
                                                <th>Januari</th>
                                                <th>Februari</th>
                                                <th>Maret</th>
                                                <th>April</th>
                                                <th>Mei</th>
                                                <th>Juni</th>
                                                <th>Juli</th>
                                                <th>Agustus</th>
                                                <th>September</th>
                                                <th>Oktober</th>
                                                <th>November</th>
                                                <th>Desember</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($realisasiBelanja as $realisasi)
                                                <tr>
                                                    <td>{{ $realisasi->nama_sub }}</td>
                                                    <td>{{ $realisasi->kode_rekening }}</td>
                                                    <td>{{ $realisasi->nama_rekening }}</td>
                                                    <td>{{ number_format($realisasi->januari_total) }}</td>
                                                    <td>{{ number_format($realisasi->februari_total) }}</td>
                                                    <td>{{ $realisasi->maret_total }}</td>
                                                    <td>{{ $realisasi->april_total }}</td>
                                                    <td>{{ $realisasi->mei_total }}</td>
                                                    <td>{{ $realisasi->juni_total }}</td>
                                                    <td>{{ $realisasi->juli_total }}</td>
                                                    <td>{{ $realisasi->agustus_total }}</td>
                                                    <td>{{ $realisasi->september_total }}</td>
                                                    <td>{{ $realisasi->oktober_total }}</td>
                                                    <td>{{ $realisasi->november_total }}</td>
                                                    <td>{{ $realisasi->desember_total }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="float-right">
                                    {{-- {{ $penerimas->withQueryString()->links() }} --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
