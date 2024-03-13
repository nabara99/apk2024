@extends('layouts.app')
<meta name="csrf-token" content="{{ csrf_token() }}">

@section('title', '')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Kwitansi</h4>
                                <div class="card-header-action">
                                    <a href="{{ route('kwitansi.index') }}" class="btn btn-primary btn-icon"><i
                                            class="fa-solid fa-arrow-rotate-left"></i></a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-2 col-md-2 col-sm-2">
                                            <label>Nomor</label>
                                            <input type="text" value="{{$kwitansi->kw_id}}/KTK/2024"
                                                class="form-control" id="kwi_id"
                                                name="kw_id" readonly>
                                        </div>
                                        <div class="col-2 col-md-2 col-sm-2">
                                            <label>Tanggal</label>
                                            <input type="text" value="{{$kwitansi->tgl}}"
                                                class="form-control datepicker"
                                                name="tgl" readonly>
                                        </div>
                                        <div class="col-6 col-md-6 col-sm-6">
                                            <label>Uraian</label>
                                            <textarea class="form-control"
                                                data-height="80" readonly
                                                name="hal">{{$kwitansi->hal}}</textarea>
                                        </div>
                                        <div class="col-2 col-md-2 col-sm-2">
                                            <label>Nilai</label>
                                            <input type="text" value="{{ number_format($kwitansi->nilai) }}"
                                                class="number-separator form-control" readonly
                                                name="nilai">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4>Rincian Pajak</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-md-12 col-sm-12">
                                            <label>Cari SP2D</label>
                                            <select
                                                class="form-control select2 select2-hidden-accessible @error('spd_id')
                                                is-invalid
                                            @enderror"
                                                style="width: 100%;" tabindex="-1" aria-hidden="true" name="spd_id">
                                                <option value="" selected disabled>--Pilih SP2D--</option>
                                                @foreach ($spds as $spd)
                                                    <option value="{{ $spd->id }}"
                                                        {{ old('spd_id') == $spd->id ? 'selected' : '' }}>
                                                        {{ $spd->no_spd }} {{ $spd->spd_uraian }} tanggal {{ $spd->spd_tgl }}</option>
                                                @endforeach
                                            </select>
                                            @error('spd_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3 col-md-3 col-sm-3">
                                            <label for="billing">Kode Billing</label>
                                            <input type="text" name="billing" id="billing" class="form-control">
                                        </div>
                                        <div class="col-3 col-md-3 col-sm-3">
                                            <label for="ntpn">NTPN</label>
                                            <input type="text" name="ntpn" id="ntpn" class="form-control">
                                        </div>
                                        <div class="col-3 col-md-3 col-sm-3">
                                            <label for="ntb">NTB</label>
                                            <input type="text" name="ntb" id="ntb" class="form-control">
                                        </div>
                                        <div class="col-2 col-md-2 col-sm-2">
                                            <label for="nilai_belanja">Nilai Belanja</label>
                                            <input type="text" name="nilai_belanja" id="nilai_belanja"
                                                class="number-separator form-control" value="0">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-2 col-md-2 col-sm-2">
                                            <label for="tgl_setor">Tanggal Bayar</label>
                                            <input type="text" name="tgl_setor" id="tgl_setor"
                                                class="form-control datepicker">
                                        </div>
                                        @if($kwitansi->ppn > 1)
                                            <div class="col-2 col-md-2 col-sm-2">
                                                <label for="">PPN</label>
                                                <div class="input-group">
                                                    <button class="btn btn-warning" id="ppn">{{number_format($kwitansi->ppn)}}</button>
                                                </div>
                                            </div>
                                        @endif
                                        @if($kwitansi->pph21 > 1)
                                            <div class="col-2 col-md-2 col-sm-2">
                                                <label for="">PPh 21</label>
                                                <div class="input-group">
                                                    <button class="btn btn-warning" id="pph21">{{number_format($kwitansi->pph21)}}</button>
                                                </div>
                                            </div>
                                        @endif
                                        @if($kwitansi->pph22 > 1)
                                            <div class="col-2 col-md-2 col-sm-2">
                                                <label for="">PPh 22</label>
                                                <div class="input-group">
                                                    <button class="btn btn-info" id="pph22">{{number_format($kwitansi->pph22)}}</button>
                                                </div>
                                            </div>
                                        @endif
                                        @if($kwitansi->pph23 > 1)
                                            <div class="col-2 col-md-2 col-sm-2">
                                                <label for="">PPh 23</label>
                                                <div class="input-group">
                                                    <button class="btn btn-warning" id="pph23">{{number_format($kwitansi->pph23)}}</button>
                                                </div>
                                            </div>
                                        @endif
                                        @if($kwitansi->pdaerah > 1)
                                            <div class="col-2 col-md-2 col-sm-2">
                                                <label for="">Pajak Daerah</label>
                                                <div class="input-group">
                                                    <button class="btn btn-info" id="pdaerah">{{number_format($kwitansi->pdaerah)}}</button>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="col-2 col-md-2 col-sm-2">
                                            <label for="nilai_belanja">Nilai Pajak</label>
                                            <input type="text" name="nilai_belanja" id="nilai_belanja"
                                                class="number-separator form-control" value="0">
                                        </div>
                                        <div class="col-2 col-md-2 col-sm-2">
                                            <label>#</label>
                                            <div class="input-group">
                                                <button type="button" class="btn btn-success" onclick="simpanItem()">
                                                    <i class="fa fa-save"></i> Simpan
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <table
                                    class="table table-striped table-responsive-lg table-responsive-md table-responsive-sm table-bordered table-hover dataTable">
                                    <thead>
                                        <tr>
                                            <th>Sub Kegiatan</th>
                                            <th>Rekening</th>
                                            <th>Uraian</th>
                                            <th>Jumlah</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="detailSpd">
                                    </tbody>
                                </table>
                                <div class="viewmodal" style="display: none;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="modal fade" id="modalAnggaran" data-backdrop="static" data-keyboard="false" tabindex="-1"
        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Anggaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="float-right">
                            <div class="input-group">
                                <input type="text" class="form-control" id="searchAnggaranInput"
                                    placeholder="Cari Anggaran" name="spd_uraian">
                                <div class="input-group-append">
                                    <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table style="width: 100%"
                        class="table table-striped table-responsive-lg table-responsive-md table-responsive-sm table-bordered table-hover dataTable dtr-inline collapsed">
                        <thead>
                            <tr>
                                <th>Sub Kegiatan</th>
                                <th>Rekening</th>
                                <th>Uraian</th>
                                <th>Pagu</th>
                                <th>Pilih</th>
                            </tr>
                        </thead>
                        <tbody id="anggaranList">
                            <!-- Daftar anggaran akan ditampilkan di sini -->
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/cleave.js/dist/cleave.min.js') }}"></script>
    <script src="{{ asset('library/cleave.js/dist/addons/cleave-phone.us.js') }}"></script>
    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('library/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('library/easy-number/easy-number-separator.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/forms-advanced-forms.js') }}"></script>

    <script>
        function kosong() {
            $('#uraian').val('');
            $('#sisa_pagu').val('');
            $('#nilai_belanja').val(0);
        }

        function simpanItem() {
            var spd_id = $('#spd_id').val();
            var anggaran_id = $('#kode_pagu').val();
            var total = $('#nilai_belanja').val();

            if (anggaran_id.length == 0) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-right',
                    iconColor: 'white',
                    customClass: {
                        popup: 'colored-toast',
                    },
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                })
                Toast.fire({
                    icon: 'error',
                    title: 'Pagu masih kosong !',
                })
                return;
            } else if (total < 1) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-right',
                    iconColor: 'white',
                    customClass: {
                        popup: 'colored-toast',
                    },
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                })
                Toast.fire({
                    icon: 'error',
                    title: 'Nilai belanja belum ada !',
                })
                return;
            } else {
                $.ajax({
                    type: "POST",
                    url: "/spdrinci",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        spd_id: spd_id,
                        anggaran_id: anggaran_id,
                        total: total,
                    },
                    success: function(response) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-right',
                            iconColor: 'white',
                            customClass: {
                                popup: 'colored-toast',
                            },
                            showConfirmButton: false,
                            timer: 1500,
                            timerProgressBar: true,
                        })
                        Toast.fire({
                            icon: 'success',
                            title: response.message,
                        })
                        loadDetailSpd(spd_id);
                        updateTotalBelanja(spd_id);
                        kosong();
                    },
                    error: function(xhr, status, error) {
                        var jsonResponse = JSON.parse(xhr.responseText);
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-right',
                            iconColor: 'white',
                            customClass: {
                                popup: 'colored-toast',
                            },
                            showConfirmButton: false,
                            timer: 1500,
                            timerProgressBar: true,
                        })
                        Toast.fire({
                            icon: 'error',
                            title: jsonResponse.message,
                        })
                    }
                });
            }

        }

        function hapusDetail(detail_id) {
            var spd_id = $('#spd_id').val();
            $.ajax({
                type: 'DELETE',
                url: '/spdrinci/' + detail_id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    $('.btn-hapus[data-id="' + detail_id + '"]').closest('tr').remove();

                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.message,
                        showConfirmButton: false,
                        timer: 2000
                    });
                    updateTotalBelanja(spd_id);
                },
                error: function(xhr, status, error) {
                    var jsonResponse = JSON.parse(xhr.responseText);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: jsonResponse.message,
                    });
                }
            });
        }

        $(document).ready(function() {

            $(document).on("click", ".select-anggaran", function() {
                var selectedAnggaranId = $(this).data("selected-id");

                // Set nilai input dengan ID anggaran yang dipilih
                $("#anggaranIdInput").val(selectedAnggaranId);

                // Memunculkan data field berdasarkan ID anggaran
                displayAnggaranData(selectedAnggaranId);
            });

            $('.nilai_belanja').select2({
                closeOnSelect: false
            });

            var spd_id = $('#spd_id').val();
            loadDetailSpd(spd_id);

            $('#spd_id').change(function() {
                spd_id = $(this).val();
                loadDetailSpd(spd_id);
            });

            $('#detailSpd').on('click', '.btn-hapus', function() {
                var detail_id = $(this).data('id');

                Swal.fire({
                    title: 'Kamu yakin?',
                    text: 'Data akan dihapus!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        hapusDetail(detail_id);
                    }
                });
            });

        });
    </script>
@endpush
