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
                                <h4>Daftar Kwitansi</h4>
                                <a href="{{ route('kwitansi.create') }}" class="btn btn-primary">Buat Kwitansi</a>
                            </div>
                            <div class="card-body">
                                <div class="float-right">
                                    <form method="GET">
                                        {{-- <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Cari rekanan"
                                                name="nama_penerima">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div> --}}
                                    </form>
                                </div>
                                <div class="clearfix mb-3"></div>
                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>
                                            <th>No. Kwitansi</th>
                                            <th>Tanggal</th>
                                            <th>Uraian</th>
                                            <th>Penerima</th>
                                            <th>Total Bayar</th>
                                            <th>Aksi</th>
                                        </tr>
                                        {{-- @foreach ($penerimas as $penerima)
                                            <tr>
                                                <td>{{ $penerima->nama_penerima }}</td>
                                                <td>{{ $penerima->jabatan_penerima }}</td>
                                                <td>{{ $penerima->alamat }}</td>
                                                <td>{{ $penerima->bank }} <br> {{ $penerima->rek_bank }}</td>
                                                <td>{{ $penerima->npwp }}</td>
                                                <td>
                                                    <div class="d-flex justify-content-left">
                                                        <a href="{{ route('penerima.edit', $penerima->id) }}"
                                                            class="btn btn-sm btn-info btn-icon">
                                                            <i class="fas fa-edit"></i>
                                                            Edit
                                                        </a>
                                                        <form action="{{ route('penerima.destroy', $penerima->id) }}"
                                                            method="POST" class="ml-2">
                                                            <input type="hidden" name="_method" value="DELETE" />
                                                            <input type="hidden" name="_token"
                                                                value="{{ csrf_token() }}" />
                                                            <button class="btn btn-sm btn-danger btn-icon confirm-delete"
                                                                onclick="return confirm('Yakin menghapus data?')">
                                                                <i class="fas fa-trash"></i> Hapus
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tr>
                                        @endforeach --}}
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