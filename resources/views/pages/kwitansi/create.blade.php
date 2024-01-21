@extends('layouts.app')

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
                    <div class="col-12 col-md-12 col-lg-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Buat Kwitansi</h4>
                                <a href="{{ route('kwitansi.index') }}" class="btn btn-primary btn-icon"><i
                                        class="fa-solid fa-arrow-left"></i> Kembali</a>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row gutters-sm">
                                        <div class="col-3 col-md-2 col-sm-2">
                                            <label for="">No. Kwitansi</label>
                                            <input type="text" name="kw_id" id="kw_id" value="<?= $item->no_faktur ?>"
                                                class="form-control" readonly>
                                        </div>
                                        <div class="col-4 col-md-3 col-sm-3">
                                            <label for="">Tgl Transaksi</label>
                                            <input type="text" name="ktgl" id="ktgl"
                                                class="form-control datepicker">
                                        </div>
                                        <div class="col-6 col-md-5 col-sm-5">
                                            <label for="">Cari Penerima</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Nama Penerima"
                                                    name="namapenerima" id="namapenerima" readonly>
                                                <input type="hidden" name="idpenerima" id="idpenerima">
                                                <div class="input-group-append">
                                                    @foreach ($penerimas as $penerima)
                                                    @endforeach
                                                    <button type="button" id="tombolCariPenerima"
                                                        class="btn btn-primary open-modal-penerima" data-toggle="modal"
                                                        data-target="#modalPenerima" data-id="{{ $penerima->id }}">
                                                        <i class="fa fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3 col-md-2 col-sm-2">
                                            <label for="">Cari Pagu</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="kodepagu" id="kodepagu"
                                                    readonly>
                                                <div class="input-group-append">
                                                    @foreach ($anggarans as $anggaran)
                                                    @endforeach
                                                    <button type="button" id="tombolCariPagu"
                                                        class="btn btn-primary open-modal" data-toggle="modal"
                                                        data-target="#modalAnggaran" data-id="{{ $anggaran->id }}">
                                                        <i class="fa fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row gutters-sm">
                                        <div class="col-6 col-md-5 col-sm-5">
                                            <label for="">Uraian</label>
                                            <input type="text" name="uraian" id="uraian" class="form-control"
                                                readonly>
                                        </div>
                                        <div class="col-4 col-md-2 col-sm-2">
                                            <label for="">Anggaran (Rp)</label>
                                            <input type="text" name="sisa_pagu" id="sisa_pagu" class="form-control"
                                                readonly>
                                        </div>
                                        <div class="col-4 col-md-2 col-sm-2">
                                            <label for="">Nilai Belanja</label>
                                            <input type="text" name="nilaibelanja" id="nilaibelanja" class="form-control"
                                                value="0" onkeydown="return numbersonly(this, event);"
                                                onkeyup="javascript:tandaPemisahTitik(this);">
                                        </div>
                                        <div class="col-4 col-md-3 col-sm-3">
                                            <label for="">#</label>
                                            <div class="input-group">
                                                <button type="button" class="btn btn-success" title="Simpan Item"
                                                    id="tombolSimpanItem">
                                                    <i class="fa fa-save"></i>
                                                </button>&nbsp
                                                <button type="button" class="btn btn-info" title="Selesai Transaksi"
                                                    id="tombolSelesaiTransaksi">
                                                    Selesai
                                                </button>
                                            </div>
                                        </div>


                                    </div>
                                </div>


                                <div class="row">
                                    {{-- <div class="col-lg-12 tampilDataTemp"></div> --}}
                                </div>
                                <div class="viewmodal" style="display: none;"></div>
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
    <div class="modal fade" id="modalPenerima" data-backdrop="static" data-keyboard="false" tabindex="-1"
        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Penerima</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="float-right">
                            <div class="input-group">
                                <input type="text" class="form-control" id="searchPenerimaInput"
                                    placeholder="Cari Penerima" name="nama_penerima">
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
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Rekening</th>
                                <th>Alamat</th>
                                <th>Pilih</th>
                            </tr>
                        </thead>
                        <tbody id="penerimaList">
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

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/forms-advanced-forms.js') }}"></script>

    <script>
        $(document).ready(function() {
            $(".open-modal").click(function() {
                var anggaranId = $(this).data('id');

                var anggaransData;

                function displayAnggarans(searchTerm) {
                    var anggaranList = $("#anggaranList");
                    anggaranList.empty();

                    // Filter data anggaran berdasarkan pencarian
                    var filteredAnggarans = anggaransData.filter(function(anggaran) {
                        return anggaran.uraian.toLowerCase().includes(searchTerm.toLowerCase());
                    });

                    // Tampilkan data anggaran yang sesuai dengan hasil pencarian
                    $.each(filteredAnggarans, function(index, anggaran) {
                        var row = $("<tr>");
                        row.append("<td>" + anggaran.nama_sub + "</td>");
                        row.append("<td>" + anggaran.kode_rekening + "</td>");
                        row.append("<td>" + anggaran.uraian + "</td>");
                        row.append("<td>" + anggaran.sisa_pagu.toLocaleString() +
                            "</td>");
                        row.append(
                            '<td><button type="button" class="btn btn-info select-anggaran" data-dismiss="modal" data-selected-id="' +
                            anggaran.id +
                            '">Pilih</button></td>');
                        anggaranList.append(row);
                    });
                }

                $.ajax({
                    type: "GET",
                    url: "/modalcaripagu",
                    success: function(response) {
                        // Simpan data anggaran dalam variabel
                        anggaransData = response.data;

                        // Tampilkan semua data anggaran pada awalnya
                        displayAnggarans("");


                        $("#modalAnggaran").modal('show');
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
                // Fungsi untuk menangani perubahan pada input pencarian
                $("#searchAnggaranInput").on("input", function() {
                    var searchTerm = $(this).val();
                    displayAnggarans(searchTerm);
                });
            });

            $(document).on("click", ".select-anggaran", function() {
                var selectedAnggaranId = $(this).data("selected-id");

                // Set nilai input dengan ID anggaran yang dipilih
                $("#anggaranIdInput").val(selectedAnggaranId);

                console.log(selectedAnggaranId);

                // Memunculkan data field berdasarkan ID anggaran
                displayAnggaranData(selectedAnggaranId);
            });

            function displayAnggaranData(anggaranId) {
                // Lakukan AJAX untuk mendapatkan data field berdasarkan ID anggaran
                $.ajax({
                    type: "GET",
                    url: "/anggaran/" + anggaranId,
                    success: function(response) {
                        $('#kodepagu').val(response.data.id);
                        $('#uraian').val(response.data.uraian);
                        $('#sisa_pagu').val(response.data.sisa_pagu.toLocaleString());
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            };

            $(".open-modal-penerima").click(function() {
                var penerimaId = $(this).data('id');

                var penerimasData;

                function displayPenerimas(searchTerm) {
                    var penerimaList = $("#penerimaList");
                    penerimaList.empty();

                    var filteredPenerimas = penerimasData.filter(function(penerima) {
                        return penerima.nama_penerima.toLowerCase().includes(searchTerm
                            .toLowerCase());
                    });

                    // Tampilkan data penerima yang sesuai dengan hasil pencarian
                    $.each(filteredPenerimas, function(index, penerima) {
                        var row = $("<tr>");
                        row.append("<td>" + penerima.nama_penerima + "</td>");
                        row.append("<td>" + penerima.jabatan_penerima + "</td>");
                        row.append("<td>" + penerima.rek_bank + "</td>");
                        row.append("<td>" + penerima.alamat + "</td>");
                        row.append(
                            '<td><button type="button" class="btn btn-info select-penerima" data-dismiss="modal" data-selected-id="' +
                            penerima.id +
                            '">Pilih</button></td>');
                        penerimaList.append(row);
                    });
                }

                $.ajax({
                    type: "GET",
                    url: "/modalcaripenerima",
                    success: function(response) {
                        penerimasData = response.data;

                        displayPenerimas("");


                        $("#modalPenerima").modal('show');
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
                // Fungsi untuk menangani perubahan pada input pencarian
                $("#searchPenerimaInput").on("input", function() {
                    var searchTerm = $(this).val();
                    displayPenerimas(searchTerm);
                });
            });

            $(document).on("click", ".select-penerima", function() {
                var selectedPenerimaId = $(this).data("selected-id");

                $("#penerimaIdInput").val(selectedPenerimaId);

                console.log(selectedPenerimaId);

                displayPenerimaData(selectedPenerimaId);
            });

            function displayPenerimaData(penerimaId) {
                $.ajax({
                    type: "GET",
                    url: "/penerima/" + penerimaId,
                    success: function(response) {
                        $('#idpenerima').val(response.data.id);
                        $('#namapenerima').val(response.data.nama_penerima);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            };

        });
    </script>
@endpush
