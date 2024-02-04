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
                                <h4>Edit Anggaran</h4>
                                <a href="{{ route('anggaran.index') }}" class="btn btn-primary btn-icon"><i
                                        class="fa-solid fa-arrow-left"></i> Kembali</a>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('anggaran.update', $anggaran) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label class="form-label">Sub Kegiatan</label>
                                        <select
                                            class="form-control select2 select2-hidden-accessible @error('sub_id')
                                            is-invalid
                                        @enderror"
                                            style="width: 100%;" tabindex="-1" aria-hidden="true" name="sub_id">
                                            <option value="{{ $anggaran->sub_id }}">
                                                {{ $anggaran->sub->kegiatan->program->kode_program }}.{{ $anggaran->sub->kegiatan->kode_kegiatan }}.{{ $anggaran->sub->kode_sub }}
                                                / {{ $anggaran->sub->nama_sub }}</option>
                                            @foreach ($subs as $sub)
                                                <option value="{{ $sub->id }}"
                                                    {{ old('sub_id') == $sub->id ? 'selected' : '' }}>
                                                    {{ $sub->kegiatan->program->kode_program }}.{{ $sub->kegiatan->kode_kegiatan }}.{{ $sub->kode_sub }}
                                                    / {{ $sub->nama_sub }}</option>
                                            @endforeach
                                        </select>
                                        @error('sub_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Rekening</label>
                                        <select
                                            class="form-control select2 select2-hidden-accessible @error('rekening_id')
                                            is-invalid
                                        @enderror"
                                            style="width: 100%;" tabindex="-1" aria-hidden="true" name="rekening_id">
                                            <option value="{{ $anggaran->rekening_id }}">
                                                {{ $anggaran->rekening->kode_rekening }} /
                                                {{ $anggaran->rekening->nama_rekening }}</option>
                                            @foreach ($rekenings as $rekening)
                                                <option value="{{ $rekening->id }}"
                                                    {{ old('rekening_id') == $rekening->id ? 'selected' : '' }}>
                                                    {{ $rekening->kode_rekening }} / {{ $rekening->nama_rekening }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('rekening_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Uraian</label>
                                        <input type="text"
                                            class="form-control @error('uraian')
                                        is-invalid
                                    @enderror"
                                            name="uraian" value="{{ $anggaran->uraian }}">
                                        @error('uraian')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Pagu</label>
                                        <input type="text"
                                            class="form-control @error('pagu')
                                        is-invalid
                                    @enderror"
                                            name="pagu" value="{{ $anggaran->pagu }}" readonly>
                                        @error('pagu')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="card-footer text-right">
                                        <button class="btn btn-primary">Update</button>
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
