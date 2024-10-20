@extends('layouts.app')

@section('title', 'DPT - ')

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
                                <h4>TPS : {{ Auth::user()->tps->no_tps }} Desa : {{ Auth::user()->tps->desa->nama_desa }}
                                    Kec : {{ Auth::user()->tps->desa->kecamatan->nama_kec }} Jumlah DPT: {{ $jumlah_dpt }}
                                </h4>

                                <a href="{{ route('dpttps.create') }}" class="btn btn-primary">Tambah DPT</a> &nbsp
                                <a href="{{ route('tps.edit', Auth::user()->tps_id) }}" class="btn btn-warning">Upload Absen</a>

                            </div>
                            <div class="card-body">
                                <div class="float-right">
                                    <form method="GET">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Cari" name="nama">
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
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Alamat</th>
                                            <th>Hadir</th>
                                            <th>Aksi</th>
                                        </tr>
                                        @forelse ($dpts as $dpt)
                                            @if ($dpt->tps)
                                                <tr data-id="{{ $dpt->id }}">
                                                    <td>{{ $dpt->nik }}</td>
                                                    <td>{{ $dpt->nama }}</td>
                                                    <td>{{ $dpt->jenkel }}</td>
                                                    <td>{{ $dpt->alamat }}</td>
                                                    <td>
                                                        @if ($dpt->hadir == 1)
                                                            <div class="badge badge-success">Hadir</div>
                                                        @else
                                                            <div class="badge badge-danger">Tidak Hadir</div>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="d-flex justify-content-left">
                                                            {{-- <a href="{{ route('dpt.edit', $dpt->id) }}"
                                                                class="btn btn-sm btn-info btn-icon" title="Edit">
                                                                <i class="fas fa-pencil"></i>
                                                            </a> --}}
                                                            <button class="btn btn-sm btn-warning btn-icon ml-2"
                                                                onclick="confirmChangeStatus('{{ $dpt->id }}')"
                                                                title="Ubah Status">
                                                                <i class="fas fa-sync-alt"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @else
                                                <tr>
                                                    <td colspan="4">Data DPT tidak tersedia untuk TPS ini</td>
                                                </tr>
                                            @endif
                                        @empty
                                            <tr>
                                                <td colspan="4">Tidak ada data DPT</td>
                                            </tr>
                                        @endforelse
                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $dpts->withQueryString()->links() }}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                @if ($tps->absen)
                    <div class="row">
                        <div class="col-12">
                            <h5>File Absen</h5>
                            <iframe src="{{ asset($tps->absen) }}" width="100%" height="600px"></iframe>
                        </div>
                    </div>
                @else
                    <p>Tidak ada file absen yang tersedia.</p>
                @endif
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>

    <script>
        function confirmChangeStatus(dptId) {
            if (confirm('Apakah Anda yakin ingin mengubah status kehadiran?')) {
                changeStatus(dptId);
            }
        }

        function changeStatus(dptId) {
            $.ajax({
                url: '/dpt/update-status/' + dptId,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {

                    if (response.success) {

                        let row = $('tr[data-id="' + dptId + '"]');
                        let statusCell = row.find('td:nth-child(5)');

                        if (response.new_status == 1) {
                            statusCell.html('<div class="badge badge-success">Hadir</div>');
                        } else {
                            statusCell.html('<div class="badge badge-danger">Tidak Hadir</div>');
                        }
                    } else {
                        alert('Terjadi kesalahan: ' + response.message);
                    }
                },
                error: function(xhr, status, error) {
                    alert('Terjadi kesalahan pada server.');
                }
            });
        }
    </script>
@endpush
