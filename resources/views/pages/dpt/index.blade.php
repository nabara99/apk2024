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
                                <h4>Jumlah DPT : {{ $jumlah_dpt }}</h4>
                                <a href="{{ route('dpt.create') }}" class="btn btn-primary">Tambah DPT</a>
                            </div>
                            <div class="card-body">
                                <div class="float-right">
                                    <form method="GET">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Cari nama / NIK" name="nama">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="clearfix mb-3"></div>
                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>
                                            <th>Kecamatan | Desa/Kel | TPS</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Kehadiran</th>
                                            <th>Status</th>
                                            {{-- <th>Aksi</th> --}}
                                        </tr>
                                        @foreach ($dpts as $dpt)
                                            <tr>
                                                <td>
                                                    {{ $dpt->tps->desa->kecamatan->nama_kec }} |
                                                    {{ $dpt->tps->desa->nama_desa }} |
                                                    {{ $dpt->tps->no_tps }}

                                                </td>
                                                <td>{{ $dpt->nik }}</td>
                                                <td>{{ $dpt->nama }}</td>
                                                <td>{{ $dpt->jenkel }}</td>
                                                <td>
                                                    @if ($dpt->hadir == 1)
                                                        <div class="badge badge-success">Hadir</div>
                                                    @else
                                                        <div class="badge badge-danger">Tidak Hadir</div>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($dpt->memilih == 1)
                                                        <div class="badge badge-success">Pro</div>
                                                    @else
                                                        <div class="badge badge-danger">Non Pro</div>
                                                    @endif
                                                </td>
                                                {{-- <td>
                                                    <div class="d-flex justify-content-left">
                                                        <a href="{{ route('dpt.edit', $dpt->id) }}"
                                                            class="btn btn-sm btn-info btn-icon" title="Edit">
                                                            <i class="fas fa-pencil"></i>
                                                        </a>
                                                    </div>
                                                </td> --}}
                                            </tr>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $dpts->withQueryString()->links() }}
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
