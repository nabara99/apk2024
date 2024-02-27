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
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Buat SP2D</h4>
                                <div class="card-header-action">
                                    <a href="{{ route('spd.index') }}" class="btn btn-primary btn-icon"><i
                                            class="fa-solid fa-arrow-rotate-left"></i></a>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('spd.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>Nomor</label>
                                        <input type="text" value="{{ old('no_spd') }}"
                                            class="form-control @error('no_spd')
                                        is-invalid
                                    @enderror"
                                            name="no_spd">
                                        @error('no_spd')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal</label>
                                        <input type="text" value="{{ old('spd_tgl') }}"
                                            class="form-control datepicker @error('spd_tgl')
                                        is-invalid
                                    @enderror"
                                            name="spd_tgl">
                                        @error('spd_tgl')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Uraian</label>
                                        <input type="text" value="{{ old('spd_uraian') }}"
                                            class="form-control @error('spd_uraian')
                                        is-invalid
                                    @enderror"
                                            name="spd_uraian">
                                        @error('spd_uraian')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Nilai</label>
                                        <input type="number" value="{{ old('spd_nilai') }}"
                                            class="form-control @error('spd_nilai')
                                        is-invalid
                                    @enderror"
                                            name="spd_nilai">
                                        @error('spd_nilai')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>IWP 1%</label>
                                        <input type="number" value="{{ old('iwp1') }}"
                                            class="form-control @error('iwp1')
                                        is-invalid
                                    @enderror"
                                            name="iwp1">
                                        @error('iwp1')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>IWP 8%</label>
                                        <input type="number" value="{{ old('iwp8') }}"
                                            class="form-control @error('iwp8')
                                        is-invalid
                                    @enderror"
                                            name="iwp8">
                                        @error('iwp8')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>PPh21</label>
                                        <input type="number" value="{{ old('pph21') }}"
                                            class="form-control @error('pph21')
                                        is-invalid
                                    @enderror"
                                            name="pph21">
                                        @error('pph21')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>PPh22</label>
                                        <input type="number" value="{{ old('pph22') }}"
                                            class="form-control @error('pph22')
                                        is-invalid
                                    @enderror"
                                            name="pph22">
                                        @error('pph22')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>PPh23</label>
                                        <input type="number" value="{{ old('pph23') }}"
                                            class="form-control @error('pph23')
                                        is-invalid
                                    @enderror"
                                            name="pph23">
                                        @error('pph23')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>PPN</label>
                                        <input type="number" value="{{ old('ppn') }}"
                                            class="form-control @error('ppn')
                                        is-invalid
                                    @enderror"
                                            name="ppn">
                                        @error('ppn')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="card-footer text-right">
                                        <button class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
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
@endpush
